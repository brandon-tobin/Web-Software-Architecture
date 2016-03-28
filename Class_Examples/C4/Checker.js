/**
 *  Author:   H. James de St. Germain
 *  Date:     Fall 2007
 *            Spring 2015 - Converted to JS
 *  Course:   CS 1410-EAE
 * 
 *  Connect Four Game "Checker"
 * 
 *  Description:
 * 
 *      This class represents a  "Checker" in a Connect Four Game.  
 * 
 *  Data Members:
 *      owner       : (String) : should be either "Player 1" or "Player 2"
 *      desitnation : (Point)  : should be the GUI final resting spot of the Checker
 *      glow_value  : (Number) : between 0 and 1 used to change the alpha during
 *                               "glowing" the winning checkers
 *      glow_going_down:(Bool) : are we getting brighter or less bright
 * 
 *  The checker is a relatively simple class.  It "drops" from the top of the
 *  screen when "played".  It sits on the screen the rest of the time.  It "glows"
 *  if the connect four game tells it to.
 */

//
// Inheritance
//
Checker.prototype = Object.create( PIXI.Graphics.prototype );
Checker.prototype.constructor = Checker;

/**
 * Checker Constructor
 * 
 * Parameters: 
 * 
 *       owner (String): Should be either "Player 1" or "Player 2"
 *       final_loc (Point): The location where the checker is to "Fall" to       
 */
function Checker( owner, final_loc )
{

    //
    // Initialization (Note: placed after function definition so we can use them)
    //
    PIXI.Graphics.call(this); // super.Sprite


    /**
     *      owner       : (String) : should be either "Player 1" or "Player 2"
     *      desitnation : (Point)  : should be the GUI final resting spot of the Checker
     *      glow_value  : (Number) : between 0 and 1 used to change the alpha during
     *                               "glowing" the winning checkers
     *      glow_going_down:(Bool) : are we getting brighter or less bright
     *
     *      timers      : used for animations
     */
    var owner_           = owner;
    var destination_     = new PIXI.Point(final_loc.x, final_loc.y);
    var glow_value_      = 1.0;
    var glow_going_down_ = true;
    var timer_glow_;
    var timer_descend_;

    
    /**
     * Draw a round circle either in black or red
     */
    var create_display_list=function() 
    {
        this.clear();
        
        if ( owner_ == "Player 1" )
        {
            this.beginFill(0x000000, glow_value_);
        }
        else
        {
            this.beginFill(0xff0000, glow_value_);
        }
        
        this.drawCircle(0,0,29);
        this.endFill();
    }.bind(this);
    
    /**
     * Used in the GUI for the checker, Event.ENTER_FRAME event.
     * 
     * "drop" the checker 10 pixels each frame
     * 
     * NOTE: the dropping checker has NOTHING to do with the STATE
     * of the game. the BOARD should keep track of that information.
     * This is all GUI.
     */
    var descend = function(event)
    {
        if ( destination_.y > this.y )
        {
            this.y += 10;
        }
        else // done falling
        {
            this.y = destination_.y;
	    window.clearInterval( timer_descend_ );
        }
    }.bind(this);


    /**
     * Special Effect. Allow the check to "pulse" by slowly
     * lowering the alpha of the checker and then bringing it back up.
     */
    var glow = function(event)
    {
        if ( glow_going_down_ )
        {
            glow_value_ -= .025;  
        }
        else
        {
            glow_value_ += .025;
        }
        
        if (glow_value_ < .5)
        {
            glow_going_down_ = false;
        }
        
        if (glow_value_ > 1)
        {
            glow_value_ = 1;
            glow_going_down_ = true;
        }
        
        create_display_list();
    }.bind(this); 

    //
    // PUBLIC
    //
    

    /**
     *  Turn the glow event off
     */
    this.glow_off = function()
    {
	window.clearInterval( timer_glow_ );
    }

    /**
     *  Turn the glow event on
     */
    this.glow_on = function()
    {
	timer_glow_ = window.setInterval(glow, 50);
    }
    
    /**
     *  Say who owns the checker
     */
    this.toString = function()
    {
        return "checker (" + owner_ + ")";
    }

    /**
     * Return the owner of the checker.  Shouuld either be "Player 1" or "Player 2"
     */
    this.get_owner = function() 
    {
        return owner_;
    }

    create_display_list();
    
    this.x = destination_.x;
    this.y = 0;
    
    timer_descend_ = window.setInterval(descend , 50);

    this.moving = true;

    

}

















