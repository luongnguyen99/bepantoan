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