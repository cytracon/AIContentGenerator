define(["./textarea", "mage/translate"], function (Textarea, $t) {
  "use strict";

  return Textarea.extend({
    openModal: function () {
      const suggestions = [
        $t(
          "Generate a meta description of up to 155 characters for a page about [topic]. Make sure to include the primary keyword [keyword], use an active voice, and include a CTA."
        ),
        $t(
          "As a SEO Expert, compose a meta description that is no more than 155 characters and SEO-optimized for the keyword [keyword] for the following web page: [page URL]."
        ),
        $t(
          "Craft a concise meta description of no more than 155 characters for the web page about [topic]. Incorporate the keyword [keyword] and effectively summarize the page’s content to entice searchers to click."
        ),
        $t(
          "Write a compelling meta description for a page about [topic] that prompt [target buyer] to click through. Ensure that the meta description is 155 characters max and includes keyword [keyword] at the beginning."
        ),
        $t(
          "Write a unique meta description under 155 characters that summarize the content of this page: [page URL]. Feature the keyword [keyword] at the beginning. Also, end the meta description with a subtle yet persuasive CTA."
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
