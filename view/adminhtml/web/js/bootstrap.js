window.showAIContentGeneratorModal = (result, onUse, suggestions) => {
  if (!window.mgz?.ai) {
    document.body.classList.add("mgz-aicg-loading");
  }

  Array.from = originalArrayFrom;
  require([
    "react",
    "reactDOM",
    "redux",
    "jquery",
    "axios",
    "Cytracon_AIContentGenerator/build/vendors/moment.min",
    "Cytracon_AIContentGenerator/build/vendors/lodash.min",
  ], (React, ReactDOM, Redux, $, axios, moment, _) => {
    window.global = window;
    window.react = React;
    window.React = React;
    window.ReactDOM = ReactDOM;
    window.Redux = Redux;
    window.$ = $;
    window.axios = axios;
    window.moment = moment;

    require([
      "react",
      "reactDOM",
      "Cytracon_AIContentGenerator/build/element/index.min",
      "Cytracon_AIContentGenerator/build/ai-content-generator/index.min",
    ], function () {
      document.body.classList.remove("mgz-aicg-loading");
      window.mgz.apiFetch.use(window.mgz.apiFetch.formKeyMiddleware);
      window.mgz.apiFetch.use(window.mgz.apiFetch.formDataMiddleware);
      window.mgz.apiFetch.setFetchHandler((options) => {
        const { data, headers, method, path, url } = options;
        return window
          .axios({
            url: url || path,
            method,
            data,
            headers,
          })
          .then((res) => res.data);
      });
      const variables = {
        "[product name]": window.aiContentGenerator.variables?.productName,
        "[category name]": window.aiContentGenerator.variables?.categoryName,
        "[page name]": window.aiContentGenerator.variables?.pageName,
      };
      window.mgz.aiContentGenerator.showAITextGeneratorModal({
        result: result,
        suggestions: _.map(
          suggestions || window.aiContentGenerator.suggestions || [],
          (suggestion) => {
            return suggestion.replace(
              /\[product name\]|\[category name\]|\[page name\]/gi,
              function (matched) {
                return variables[matched];
              }
            );
          }
        ),
        onUse,
        generateTextUrl: window.aiContentGenerator.generateTextUrl,
        loadSettingsUrl: window.aiContentGenerator.loadSettingsUrl,
        saveSettingsUrl: window.aiContentGenerator.saveSettingsUrl,
      });
    });
  });
};
