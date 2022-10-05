CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example
	config.language = 'es';
	// config.uiColor = '#AADC6E';
	config.skin =  'office2013';
	config.extraPlugins = 'widget,tabletoolstoolbar,codesnippet,chart,notification,wordcount,sourcedialog,codemirror,uploadimage,wysiwygarea,wsc,videodetector,videoembed';
	config.uploadUrl = '/uploader/upload.php';
	config.filebrowserBrowseUrl = 'plugins/elFinder/elfinder.html';
	config.codemirror = {
	    // Set this to the theme you wish to use (codemirror themes)
	    theme: 'default',
	    // Whether or not you want to show line numbers
	    lineNumbers: true,
	    // Whether or not you want to use line wrapping
	    lineWrapping: true,
	    // Whether or not you want to highlight matching braces
	    matchBrackets: true,
	    // Whether or not you want tags to automatically close themselves
	    autoCloseTags: true,
	    // Whether or not you want Brackets to automatically close themselves
	    autoCloseBrackets: true,
	    // Whether or not to enable search tools, CTRL+F (Find), CTRL+SHIFT+F (Replace), CTRL+SHIFT+R (Replace All), CTRL+G (Find Next), CTRL+SHIFT+G (Find Previous)
	    enableSearchTools: true,
	    // Whether or not you wish to enable code folding (requires 'lineNumbers' to be set to 'true')
	    enableCodeFolding: true,
	    // Whether or not to enable code formatting
	    enableCodeFormatting: true,
	    // Whether or not to automatically format code should be done when the editor is loaded
	    autoFormatOnStart: true,
	    // Whether or not to automatically format code should be done every time the source view is opened
	    autoFormatOnModeChange: true,
	    // Whether or not to automatically format code which has just been uncommented
	    autoFormatOnUncomment: true,
	    // Define the language specific mode 'htmlmixed' for html including (css, xml, javascript), 'application/x-httpd-php' for php mode including html, or 'text/javascript' for using java script only
	    mode: 'htmlmixed',
	    // Whether or not to show the search Code button on the toolbar
	    showSearchButton: true,
	    // Whether or not to show Trailing Spaces
	    showTrailingSpace: true,
	    // Whether or not to highlight all matches of current word/selection
	    highlightMatches: true,
	    // Whether or not to show the format button on the toolbar
	    showFormatButton: true,
	    // Whether or not to show the comment button on the toolbar
	    showCommentButton: true,
	    // Whether or not to show the uncomment button on the toolbar
	    showUncommentButton: true,
	    // Whether or not to show the showAutoCompleteButton button on the toolbar
	    showAutoCompleteButton: true,
	    // Whether or not to highlight the currently active line
	    styleActiveLine: true
	};
	config.wordcount = {
	    // Whether or not you want to show the Paragraphs Count
	    showParagraphs: true,
	    // Whether or not you want to show the Word Count
	    showWordCount: true,
	    // Whether or not you want to show the Char Count
	    showCharCount: true,
	    // Whether or not you want to count Spaces as Chars
	    countSpacesAsChars: false,
	    // Whether or not to include Html chars in the Char Count
	    countHTML: false,
	    // Maximum allowed Word Count, -1 is default for unlimited
	    maxWordCount: -1,
	    // Maximum allowed Char Count, -1 is default for unlimited
	    maxCharCount: -1,
	    // Add filter to add or remove element before counting (see CKEDITOR.htmlParser.filter), Default value : null (no filter)
	    filter: new CKEDITOR.htmlParser.filter({
	        elements: {
	            div: function( element ) {
	                if(element.attributes.class == 'mediaembed') {
	                    return false;
	                }
	            }
	        }
	    })
	};

};
