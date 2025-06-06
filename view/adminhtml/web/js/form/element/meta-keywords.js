define(["./textarea", "mage/translate"], function (Textarea, $t) {
  "use strict";

  return Textarea.extend({
    openModal: function () {
      const suggestions = [
        $t(
          "Generate 5 high-volume keywords for the following page: [page URL] to optimize search engine rankings."
        ),
        $t(
          "Generate a list of 5 long-tail keywords related to the main keyword [keyword] that have low keyword difficulty scores but high search volumes."
        ),
        $t(
          "Give me 5 long-tail keywords related to [topic] with their search intent."
        ),
        $t(
          "Provide me with 10 long-tail, high-volume, low-difficulty keywords for [topic] as if you’re a content marketer."
        ),
        $t(
          "Give me a list of 5 keywords I could use for someone who is looking for [product] in [location]."
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
