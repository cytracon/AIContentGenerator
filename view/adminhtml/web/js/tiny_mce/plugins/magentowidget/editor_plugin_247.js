define([
    "mage/translate",
    "wysiwygAdapter",
    "jquery",
    "Cytracon_AIContentGenerator/js/bootstrap",
  ], function ($t) {
    return function () {
      mgzaicg = function (editor) {
        this.widget = {
          /**
           * @return {Object}
           */
          getInfo: function () {
            return {
              longname: "Cytracon AI Content Generator",
              author: "Cytracon",
              authorurl: "https://www.cytracon.com/",
              infourl: "https://www.cytracon.com/",
              version: "1.0",
            };
          },
        }
  
        self = this.widget;
  
        /**
         * Add new command to open variables selector slideout.
         */
        editor.addCommand(
          "openAIContentGeneratorModal",
          function (commandConfig) {
            // var selectedElement;
            // if (commandConfig) {
            //   selectedElement = commandConfig.selectedElement;
            // } else {
            //   selectedElement = tinymce.activeEditor.selection.getNode();
            // }
            let suggestions = window.aiContentGenerator?.suggestions;
            if (tinymce.activeEditor.id === "product_form_short_description") {
              suggestions = [
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
            }
  
            const result = tinymce.activeEditor.selection.getContent({
              format: "html",
            });
            window.showAIContentGeneratorModal(
              result,
              (result) => {
                tinymce.activeEditor.selection.setContent(result);
              },
              suggestions
            );
          }
        );
  
        /**
         * Add button to the editor toolbar.
         */
        editor.ui.registry.addIcon(
          "mgzaicg",
          `<span class="mgz-aicg-tinymce-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
  <g clip-path="url(#clip0_221_12782)">
  <path d="M17.9903 3.40194C17.9435 3.16823 17.7383 3 17.5 3C17.2617 3 17.0565 3.16823 17.0097 3.40194L16.9019 3.94078C16.704 4.93043 15.9304 5.70401 14.9408 5.90194L14.4019 6.00971C14.1682 6.05645 14 6.26166 14 6.5C14 6.73834 14.1682 6.94355 14.4019 6.99029L14.9408 7.09806C15.9304 7.29599 16.704 8.06957 16.9019 9.05922L17.0097 9.59806C17.0565 9.83177 17.2617 10 17.5 10C17.7383 10 17.9435 9.83177 17.9903 9.59806L18.0981 9.05922C18.296 8.06957 19.0696 7.29599 20.0592 7.09806L20.5981 6.99029C20.8318 6.94355 21 6.73834 21 6.5C21 6.26166 20.8318 6.05645 20.5981 6.00971L20.0592 5.90194C19.0696 5.70401 18.296 4.93043 18.0981 3.94078L17.9903 3.40194ZM10.9824 6.36844C10.9231 6.15091 10.7255 6 10.5 6C10.2745 6 10.0769 6.15091 10.0176 6.36844L9.57009 8.00939C8.96451 10.2298 7.22985 11.9645 5.00939 12.5701L3.36844 13.0176C3.15091 13.0769 3 13.2745 3 13.5C3 13.7255 3.15091 13.9231 3.36844 13.9824L5.00939 14.4299C7.22985 15.0355 8.96451 16.7702 9.57009 18.9906L10.0176 20.6316C10.0769 20.8491 10.2745 21 10.5 21C10.7255 21 10.9231 20.8491 10.9824 20.6316L11.4299 18.9906C12.0355 16.7702 13.7702 15.0355 15.9906 14.4299L17.6316 13.9824C17.8491 13.9231 18 13.7255 18 13.5C18 13.2745 17.8491 13.0769 17.6316 13.0176L15.9906 12.5701C13.7702 11.9645 12.0355 10.2298 11.4299 8.00939L10.9824 6.36844Z" fill="#A82DFD"></path>
  </g>
  <defs>
  <clipPath id="clip0_221_12782">
  <rect width="24" height="24" fill="white"/>
  </clipPath>
  </defs>
  </svg></span>
  `
        );
        editor.ui.registry.addToggleButton("mgzaicg", {
          icon: "mgzaicg",
          tooltip: jQuery.mage.__("Generate Text with AI"),
  
          /**
           * execute openAIContentGeneratorModal for onAction callback
           */
          onAction: function () {
            editor.execCommand("openAIContentGeneratorModal");
          },
  
          /**
           * Highlight or dismiss Insert Variable button when variable is selected or deselected.
           */
          onSetup: function (api) {
            /**
             * Toggle active state of Insert Variable button.
             *
             * @param {Object} e
             */
            var toggButton = function (e) {
              api.setActive(false);
  
              if (jQuery(e.target).hasClass("mgz-aicg")) {
                api.setActive(true);
              }
            };
  
            editor.on("click", toggButton);
            editor.on("change", toggButton);
          },
        });
  
        /**
         * Double click handler on the editor to handle dbl click on variable placeholder.
         */
        editor.on("dblclick", function (evt) {
          if (jQuery(evt.target).hasClass("mgz-aicg")) {
            editor.selection.collapse(false);
            editor.execCommand("openAIContentGeneratorModal", {
              ui: true,
              selectedElement: evt.target,
            });
          }
        });
  
        /**
                   * Attach event handler for when wysiwyg editor is about to encode its content
                   */
        varienGlobalEvents.attachEventHandler('wysiwygEncodeContent', function (content) {
            content = self.encodeWidgets(self.decodeWidgets(content));
            content = self.removeDuplicateAncestorWidgetSpanElement(content);
  
            return content;
        });
  
        /**
         * Attach event handler for when wysiwyg editor is about to decode its content
         */
        varienGlobalEvents.attachEventHandler('wysiwygDecodeContent', function (content) {
            content = self.decodeWidgets(content);
  
            return content;
        });
  
        /**
         * Attach event handler for when popups associated with wysiwyg are about to be closed
         */
        varienGlobalEvents.attachEventHandler('wysiwygClosePopups', function () {
            wysiwyg.closeEditorPopup('widget_window' + wysiwyg.getId());
        });
      };
  
      /**
       * Register plugin
       */
      tinymce.PluginManager.add("mgzaicg", mgzaicg);
    };
  });
  