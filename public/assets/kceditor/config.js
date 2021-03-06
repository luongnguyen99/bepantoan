/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */
CKEDITOR.editorConfig = function (config) {
	config.filebrowserBrowseUrl = '/ckfinder/browser';
	config.filebrowserImageBrowseUrl = '/ckfinder/browser?type=Images';
	config.filebrowserFlashBrowseUrl = '/ckfinder/browser?type=Flash';
	config.filebrowserUploadUrl = '/ckfinder/connector?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = '/ckfinder/connector?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = '/ckfinder/connector?command=QuickUpload&type=Flash';
	config.toolbar = 'Basic';
	/ this does the magic /
	config.uiColor = '#ecf0f5';
};

// CKEDITOR.editorConfig = function( config ) {
	
// 	// config.filebrowserBrowseUrl = './ckeditor/ckfinder/ckfinder.html';
//     // config.filebrowserImageBrowseUrl = './ckeditor/ckfinder/ckfinder.html?type=Images';
//     // config.filebrowserFlashBrowseUrl = './ckeditor/ckfinder/ckfinder.html?type=Flash';
//     // config.filebrowserUploadUrl = './ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
//     // // config.filebrowserImageUploadUrl = './ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
//     // config.filebrowserFlashUploadUrl = './ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
// 	http://localhost:8000/kcfinder/browse.php?opener=ckeditor&type=images&CKEditor=editor&CKEditorFuncNum=0&langCode=vi
	
// 	config.filebrowserBrowseUrl = '/bepantoan/userfiles/images';
// 	config.filebrowserImageBrowseUrl = '/bepantoan/userfiles/images';
	
	
// 	config.filebrowserFlashBrowseUrl = '/bepantoan/userfiles/images';
// 	config.filebrowserUploadUrl = '/bepantoan/userfiles/images';
// 	config.filebrowserImageUploadUrl = '/bepantoan/userfiles/images';
// 	config.filebrowserFlashUploadUrl = '/bepantoan/userfiles/images';
		
	
	
// 	// Define changes to default configuration here.
// 	// For complete reference see:
// 	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

// 	// The toolbar groups arrangement, optimized for two toolbar rows.
// 	config.toolbarGroups = [
// 		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
// 		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
// 		{ name: 'links' },
// 		{ name: 'insert' },
// 		{ name: 'forms' },
// 		{ name: 'tools' },
// 		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
// 		{ name: 'others' },
// 		'/',
// 		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
// 		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
// 		{ name: 'styles' },
// 		{ name: 'colors' },
// 		{ name: 'about' }
// 	];

// 	// Remove some buttons provided by the standard plugins, which are
// 	// not needed in the Standard(s) toolbar.
// 	config.removeButtons = 'Underline,Subscript,Superscript';

// 	// Set the most common block elements.
// 	config.format_tags = 'p;h1;h2;h3;pre';

// 	// Simplify the dialog windows.
// 	config.removeDialogTabs = 'image:advanced;link:advanced';


	
// };
