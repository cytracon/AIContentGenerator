define([
  "Magento_Ui/js/form/element/abstract",
  "mage/translate",
  "Cytracon_AIContentGenerator/js/bootstrap",
], function (Abstract, $t) {
  "use strict";

  return Abstract.extend({
    defaults: {
      elementTmpl: "Cytracon_AIContentGenerator/form/element/input",
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
