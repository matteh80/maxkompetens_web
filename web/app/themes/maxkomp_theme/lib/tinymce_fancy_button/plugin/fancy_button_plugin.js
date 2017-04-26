(function() {
  tinymce.create('tinymce.plugins.Wptuts', {
    /**
     * Initializes the plugin, this will be executed after the plugin has been created.
     * This call is done before the editor instance has finished it's initialization so use the onInit event
     * of the editor instance to intercept that event.
     *
     * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
     * @param {string} url Absolute URL to where the plugin is located.
     */
    init : function(ed, url) {
      ed.addButton('fancy_button', {
        title : 'Fancy Button',
        // cmd : 'fancy_button',
        image : url + '/fancy_button.jpg',
        onclick: function() {
          // Open window
          ed.windowManager.open({
            title: 'Fancy Button',
            body: [
              {
                type   : 'listbox',
                name   : 'color',
                label  : 'Color',
                values : [
                  { text: 'Orange', value: 'bg-orange' },
                  { text: 'Green', value: 'bg-green' }
                ],
                value : 'bg-orange' // Sets the default
              },
              {type: 'textbox', name: 'url', label: 'Link'},
              {type: 'textbox', name: 'text', label: 'Text'}
            ],
            onsubmit: function(e) {
              // Insert content when the window form is submitted
              ed.insertContent('[fancy_button color="green" url="/investerare" text="Bemanning"]');
            }
          });
        }
      });
    },

    /**
     * Creates control instances based in the incomming name. This method is normally not
     * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
     * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
     * method can be used to create those.
     *
     * @param {String} n Name of the control to create.
     * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
     * @return {tinymce.ui.Control} New control instance or null if no control was created.
     */
    createControl : function(n, cm) {
      return null;
    },

    /**
     * Returns information about the plugin as a name/value array.
     * The current keys are longname, author, authorurl, infourl and version.
     *
     * @return {Object} Name/value array containing information about the plugin.
     */
    getInfo : function() {
      return {
        longname : 'Wptuts Buttons',
        author : 'Lee',
        authorurl : 'http://wp.tutsplus.com/author/leepham',
        infourl : 'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/example',
        version : "0.1"
      };
    }
  });

  // Register plugin
  tinymce.PluginManager.add( 'wptuts', tinymce.plugins.Wptuts );
})();