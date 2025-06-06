const aiRequireConfig = {
  shim: {
    "Cytracon_AIContentGenerator/build/deprecated/index.min": {
      deps: ["Cytracon_AIContentGenerator/build/hooks/index.min"],
    },
    "Cytracon_AIContentGenerator/build/dom/index.min": {
      deps: ["Cytracon_AIContentGenerator/build/deprecated/index.min"],
    },
    reactDOM: { deps: ["react"] },
    "Cytracon_AIContentGenerator/build/element/index.min": {
      deps: [
        "Cytracon_AIContentGenerator/build/escape-html/index.min",
        "react",
        "reactDOM",
      ],
    },
    "Cytracon_AIContentGenerator/build/i18n/index.min": {
      deps: ["Cytracon_AIContentGenerator/build/hooks/index.min"],
    },
    "Cytracon_AIContentGenerator/build/keycodes/index.min": {
      deps: ["Cytracon_AIContentGenerator/build/i18n/index.min"],
    },
    "Cytracon_AIContentGenerator/build/undo-manager/index.min": {
      deps: ["Cytracon_AIContentGenerator/build/is-shallow-equal/index.min"],
    },
    "Cytracon_AIContentGenerator/build/compose/index.min": {
      deps: [
        "Cytracon_AIContentGenerator/build/deprecated/index.min",
        "Cytracon_AIContentGenerator/build/dom/index.min",
        "Cytracon_AIContentGenerator/build/element/index.min",
        "Cytracon_AIContentGenerator/build/is-shallow-equal/index.min",
        "Cytracon_AIContentGenerator/build/keycodes/index.min",
        "Cytracon_AIContentGenerator/build/priority-queue/index.min",
        "Cytracon_AIContentGenerator/build/undo-manager/index.min",
      ],
    },
    "Cytracon_AIContentGenerator/build/data/index.min": {
      deps: [
        "Cytracon_AIContentGenerator/build/compose/index.min",
        "Cytracon_AIContentGenerator/build/deprecated/index.min",
        "Cytracon_AIContentGenerator/build/element/index.min",
        "Cytracon_AIContentGenerator/build/is-shallow-equal/index.min",
        "Cytracon_AIContentGenerator/build/priority-queue/index.min",
        "Cytracon_AIContentGenerator/build/private-apis/index.min",
        "Cytracon_AIContentGenerator/build/redux-routine/index.min",
      ],
    },
    "Cytracon_AIContentGenerator/build/ui/index.min": {
      deps: ["Cytracon_AIContentGenerator/build/i18n/index.min"],
    },
    "Cytracon_AIContentGenerator/build/modal/index.min": {
      deps: [
        "Cytracon_AIContentGenerator/build/ui/index.min",
        "Cytracon_AIContentGenerator/build/data/index.min",
        "Cytracon_AIContentGenerator/build/element/index.min",
      ],
    },
    "Cytracon_AIContentGenerator/build/api-fetch/index.min": {
      deps: [
        "Cytracon_AIContentGenerator/build/i18n/index.min",
        "Cytracon_AIContentGenerator/build/url/index.min",
      ],
    },
    "Cytracon_AIContentGenerator/build/primitives/index.min": {
      deps: ["Cytracon_AIContentGenerator/build/element/index.min"],
    },
    "Cytracon_AIContentGenerator/build/icons/index.min": {
      deps: [
        "Cytracon_AIContentGenerator/build/element/index.min",
        "Cytracon_AIContentGenerator/build/primitives/index.min",
      ],
    },
    "Cytracon_AIContentGenerator/build/formik/index.min": {
      deps: [
        "Cytracon_AIContentGenerator/build/element/index.min",
        "Cytracon_AIContentGenerator/build/i18n/index.min",
        "Cytracon_AIContentGenerator/build/ui/index.min",
        "Cytracon_AIContentGenerator/build/data/index.min",
        "Cytracon_AIContentGenerator/build/compose/index.min",
      ],
    },
    "Cytracon_AIContentGenerator/build/form/index.min": {
      deps: [
        "Cytracon_AIContentGenerator/build/ui/index.min",
        "Cytracon_AIContentGenerator/build/formik/index.min",
      ],
    },
    "Cytracon_AIContentGenerator/build/outside-click/index.min": {
      deps: ["Cytracon_AIContentGenerator/build/element/index.min"],
    },
    "Cytracon_AIContentGenerator/build/ai-content-generator/index.min": {
      deps: [
        "Cytracon_AIContentGenerator/build/data/index.min",
        "Cytracon_AIContentGenerator/build/modal/index.min",
        "Cytracon_AIContentGenerator/build/ui/index.min",
        "Cytracon_AIContentGenerator/build/i18n/index.min",
        "Cytracon_AIContentGenerator/build/element/index.min",
        "Cytracon_AIContentGenerator/build/keycodes/index.min",
        "Cytracon_AIContentGenerator/build/compose/index.min",
        "Cytracon_AIContentGenerator/build/api-fetch/index.min",
        "Cytracon_AIContentGenerator/build/icons/index.min",
        "Cytracon_AIContentGenerator/build/form/index.min",
        "Cytracon_AIContentGenerator/build/outside-click/index.min",
      ],
    },
  },
};

var config = {
  paths: {
    react: "Cytracon_AIContentGenerator/build/vendors/react.min",
    reactDOM: "Cytracon_AIContentGenerator/build/vendors/react-dom.min",
    redux: "Cytracon_AIContentGenerator/build/vendors/redux.min",
    axios: "Cytracon_AIContentGenerator/build/vendors/axios.min",
  },
  shim: {
    ...aiRequireConfig.shim,
  },
};
