define(["./textarea", "mage/translate"], function (Textarea, $t) {
  "use strict";

  return Textarea.extend({
    openModal: function () {
      const suggestions = [
        $t(
          "Write a 3-4 sentence product description for [product name]. Highlight the following features: [product features]. Don’t forget to seamlessly incorporate these keywords into the description: [keywords]."
        ),
        $t(
          "Write a 4-5 sentence paragraph to describe [product name]. Include these details, stated in the form of benefits for the customer: [product benefits]. Add a bullet list of these features: [features]."
        ),
        $t(
          "Compose a product description of 150 words for [product name] that highlights its unique features: [features]. Besides, clearly differentiate it from competing products in the market. Here’s what makes it different: [list of differences]."
        ),
        $t(
          "Craft a compelling 50-word description of [product name] that not only showcases the product’s benefits but also creates a sense of urgency and excitement for [target buyer]. Here are some details about the product: [product details]."
        ),
        $t(
          "Create a 150-word description for [product name], a [product type] with the expertise of an experienced copywriter. Craft a narrative that’s compelling, engaging, and will convince the [target buyer] to convert. Here are some product features: [product features]."
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
