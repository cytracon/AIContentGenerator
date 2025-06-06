define(["./import-handler", "mage/translate"], function (ImportHandler, $t) {
  "use strict";

  return ImportHandler.extend({
    openModal: function () {
      const suggestions = [
        $t(
          "Create an engaging meta title for the following page: [page URL]. Keep it between 50 to 60 characters."
        ),
        $t(
          "Write a SEO-optimized title tag under 60 characters for a page on [topic]. Incorporate the keyword [keyword] to enhance its visibility and relevancy."
        ),
        $t(
          "Generate a concise and SEO-friendly meta title for a page about [topic], including the keyword [keyword] at the start. Also include [brand name] as the brand name."
        ),
        $t(
          "Craft a title of no more than 60 characters for a page about [topic]. Ensure the primary keyword [keyword] is integrated naturally into the title. The title should invoke curiosity and offer value to intrigue searchers to click."
        ),
        $t(
          "As a content marketer, write a catchy meta title for the page: [page URL] to attract [target audience] to click. Focus on [keyword] as the primary keyword and ensure that the meta title is 55 characters max."
        ),
      ];
      window.showAIContentGeneratorModal(
        this.value(),
        (result) => {
          this.value(result);
        },
        suggestions
      );
    },
  });
});
