define([
  "Magento_Ui/js/form/element/textarea",
  "mage/translate",
  "Cytracon_AIContentGenerator/js/bootstrap",
], function (Textarea, $t) {
  "use strict";

  return Textarea.extend({
    defaults: {
      elementTmpl: "Cytracon_AIContentGenerator/form/element/textarea",
    },

    /**
     * Init observable variables
     * @return {Object}
     */
    initObservable: function () {
      this._super().observe(["isActived"]);

      return this;
    },

    isEnabled: function () {
      return !!window.aiContentGenerator?.isEnabled;
    },

    openModal: function () {
      window.showAIContentGeneratorModal(this.value(), (result) =>
        this.value(result)
      );
    },

    getImgSrc: function () {
      return `${require.baseUrl}/Cytracon_AIContentGenerator/images/icon-ai-creator.svg`;
    },

    getText: function () {
      return this.value() ? $t("Edit with AI") : $t("Create with AI");
    },

    handleKeyPress: function (d, e) {
      if (e.keyCode === 13) {
        this.openModal();
      }
    },
  });
});
