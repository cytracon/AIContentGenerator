define([
  "mage/translate",
  "wysiwygAdapter",
  "jquery",
  "Cytracon_AIContentGenerator/js/bootstrap"
], function ($t, wysiwygAdapter, $, bootstrap) {
  return function () {
    tinymce.PluginManager.add("mgzaicg", function (editor) {
      const suggestions = [];

      if (editor.id === "product_form_short_description") {
        suggestions.push(
          $t("Write a 3-4 sentence product description for [product name]. Highlight the following features: [product features]. Don’t forget to seamlessly incorporate these keywords into the description: [keywords]."),
          $t("Write a 4-5 sentence paragraph to describe [product name]. Include these details, stated in the form of benefits for the customer: [product benefits]. Add a bullet list of these features: [features]."),
          $t("Compose a product description of 150 words for [product name] that highlights its unique features: [features]. Besides, clearly differentiate it from competing products in the market. Here’s what makes it different: [list of differences]."),
          $t("Craft a compelling 50-word description of [product name] that not only showcases the product’s benefits but also creates a sense of urgency and excitement for [target buyer]. Here are some details about the product: [product details]."),
          $t("Create a 150-word description for [product name], a [product type] with the expertise of an experienced copywriter. Craft a narrative that’s compelling, engaging, and will convince the [target buyer] to convert. Here are some product features: [product features].")
        );
      }

      editor.addCommand("openAIContentGeneratorModal", function () {
        const result = editor.selection.getContent({ format: "html" });
        window.showAIContentGeneratorModal(result, function (newContent) {
          editor.selection.setContent(newContent);
        }, suggestions);
      });

      editor.ui.registry.addIcon("mgzaicg", '<svg width="24" height="24" ... ></svg>'); // Icon SVG einfügen

      editor.ui.registry.addToggleButton("mgzaicg", {
        icon: "mgzaicg",
        tooltip: $t("Generate Text with AI"),
        onAction: function () {
          editor.execCommand("openAIContentGeneratorModal");
        },
        onSetup: function (api) {
          const toggleButton = function (e) {
            api.setActive($(e.target).hasClass("mgz-aicg"));
          };
          editor.on("click", toggleButton);
          editor.on("change", toggleButton);
        }
      });

      editor.on("dblclick", function (evt) {
        if ($(evt.target).hasClass("mgz-aicg")) {
          editor.selection.collapse(false);
          editor.execCommand("openAIContentGeneratorModal", {
            ui: true,
            selectedElement: evt.target
          });
        }
      });

      return {
        getMetadata: function () {
          return {
            name: "Cytracon AI Content Generator",
            url: "https://www.cytracon.com/"
          };
        }
      };
    });
  };
});
