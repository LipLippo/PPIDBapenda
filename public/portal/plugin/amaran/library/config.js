/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.filebrowserBrowseUrl = 'assets/plugin/amaran/config/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = 'assets/plugin/amaran/config/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = 'assets/plugin/amaran/config/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = 'assets/plugin/amaran/config/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = 'assets/plugin/amaran/config/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = 'assets/plugin/amaran/config/upload.php?opener=ckeditor&type=flash';
};
