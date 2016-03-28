

/**
 *  Author:    H. James de St. Germain
 *  Date:      Spring 2015
 *  Copyright: Spring 2015
 *
 * Helper to preload assets 
 * 
 */


/**
 *
 * all objects with image assets that need to be preloaded should
 * 
 * utilize this function.
 *
 *   1) create the jim loader setting a final on_complete callback
 *   2) FOR EACH object calls jim_loader.set_preload_images( path, name_array)
 *   3) execute final load
 * 
 *  FIXME: should be able to easily tie this to a loading animation
 *
 */
function Jim_Loader( on_complete_cb, on_progress_cb )
{

    var assets_to_load_ = [];
    var on_complete_ = on_complete_cb;
    var on_progress_ = on_progress_cb;
    var loader;

    var completed = 0;


    /**
     * set a list of images to be preloaded
     *
     * WARNING: does not load until load is called
     *
     * path - http:// ... path to files /                   (e.g., http://www.cs.utah.edu/~germain/Jim_JS/Button/")
     * name_array - an array of names of images (sans path) (e.g., ["button.png", "button_over.png"])
     *
     */
    this.set_preload_images = function( path, name_array )
    {
        for (var i=0; i<name_array.length; i++)
        {
            assets_to_load_.push(path + name_array[i]);
        }
    };

    this.load = function()
    {   
	loader = new PIXI.AssetLoader( assets_to_load_ );
        loader.onComplete = on_complete_;
	loader.onProgress = on_progress_;
        loader.load();
    };

    //
    // return total number of assets to load
    //
    this.get_total = function()
    {
	return loader.assetURLs.length;
    }
}

