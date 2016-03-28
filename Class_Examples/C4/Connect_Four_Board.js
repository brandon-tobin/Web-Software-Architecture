/**
 *  Author:   H. James de St. Germain
 *  Date:     Fall 2007
 *            Spring 2015 - Converted to JS
 *  Course:   CS 1410-EAE
 * 
 *  Connect Four Game Board
 * 
 *  Description:
 * 
 *      This class represents a Connect Four Game.  
 * 
 *  Data Members:
 *      board : a 6x7 matrix of checkers (or nulls)
 *      player_1s_turn_: a boolean
 *      game_over: a boolean
 * 
 *  The game basically operates from the "drop_in_column" function
 *  which updates the state of the game after each play.
 * 
 *  
 * 
 */


//
// Inheritance
//
Connect_Four_Board.prototype = Object.create( PIXI.Graphics.prototype );
Connect_Four_Board.prototype.constructor = Connect_Four_Board;

/**
 *  Board: A 6x7 matrix of Checkers.  Initially all null to represent an empty game.
 *  
 *  player_1s_turn_ : true if playe 1 is making a move
 * 
 *  game_over: true if the game has been won or is a draw
 * 
 *  piece_count: how many checkers have been played (used for draws)
 * 
 * 
 *  Connect Four Constructor
 * 
 *  Initialize the game to the start state.  Create the array of
 *  checkers and all GUI elements (the buttons).
 * 
 */
function Tetris_Board ()
{
    //
    // Initialization (Note: placed after function definition so we can use them)
    //
    PIXI.Graphics.call(this); // super.Sprite
    
    /**
     *  Change the turn variable 
     */
    function swap_turns() 
    {
        player_1s_turn_ = !player_1s_turn_;
    }
    
    /**
     * 
     * Given a row and column in the matrix, use some
     * math to determine where on the GUI world the checker
     * belongs.  Note that checkers are 40 pixels between centers (in the X) and
     * the first center is at position 80.
     *
     *  Rows range from 0 to 5
     *
     */
    function convert_to_pixel(row, col)
    {
        return new PIXI.Point( col * 69 -5, row * 69 + 61);
    }
    
    /**
     * 
     *  This is the main function of the class.  It simulates all the
     *  game actions assocaited with dropping a checker in the connect four game.
     * 
     *  These actions include:
     * 
     *     1) checking if it is valid to drop the checker.
     *     2) creating and placing the checker in the board Matrix and on the GUI
     *     3) checking for a win
     *     4) switching turns
     * 
     * Note, we switch turns even after someone has won so that the next
     * time we play, the other person will go first.
     * 
     */
    var drop_in_column = function( col )
    {
        if ( game_over_ )
        {
            return;
        }
        
        var row = 0;
        col = col - 1;
        
        while ( row < board_.length && board_[row][col] == null )
        {
            row++;
        }
        
        // found "bucket" after the last empty one, so back up one
        row = row - 1;
        
        if (row == -1)
        {
            return;
        }
        
        
        var pixel_location = convert_to_pixel( row, col+1 );
        var checker;
        
        if ( player_1s_turn_ )
        {
            checker = new Checker( "Player 1", pixel_location);
        }
        else
        {   
            checker = new Checker( "Player 2", pixel_location );
        }
        
        this.addChildAt(checker,0);
        
        board_[row][col] = checker;
        piece_count_++;
        
        if ( check_for_win() )
        {
            game_over_ = true;
        }
        
        if (piece_count_ == 42 && !game_over_)
        {
            console.log("draw");
            // nothing fancy done... just sit there and wait for a reset...
        }
        
        swap_turns();
    }.bind(this);
    
    /**
     * When a button is pressed, call the drop_in_column function
     * with the appropriate column number
     */
    var button_event_handler = function ( event )
    {
        var button = event.target;
        drop_in_column( button.get_value() );
    }
    
    /**
     * Reset the game back to the original empty state.
     * Clear the piece_count.  set game_over to false.
     * remove all the old checkers (and if they were glowing, turn them off)
     */
    var reset = function( event )
    {
        game_over_ = false;
        piece_count_ = 0;
        
        for (var i=0;i<board_.length; i++)
        {
            for (var j=0;j<board_[0].length; j++)
            {
                if (board_[i][j] != null)
                {
                    var checker = board_[i][j];
                    checker.glow_off();
                    board_[i][j] = null;
                    this.removeChild(checker);
                }
            }
        }
        
    }.bind(this);
    
    /**
     * The game board has been saved as a separate flash "movie"
     * created in CS3. Here we import and use it. 
     */
    var create_display_list = function()
    {

        var texture = PIXI.Texture.fromImage("images/board.png");
        var sprite = new PIXI.Sprite(texture);
        
        this.addChild(sprite);
    }.bind(this);
    
    
    /**
     *  Check all horizontal groupings of 4 checkers for a win.
     *  If four checkers are all equivalent, in a row, set them
     *  to "glowing" and return true.
     * 
     *  NOTE: we check all possible rows in case more than four
     *  checkers are involved in a win!
     * 
     */
    var check_horizontal_win_condition=function()
    {
        var status  = false;
        for (var i=0;i<board_.length; i++)
        {
            for (var j=0;j<board_[0].length-3; j++)
            {
                var c1;
                var c2;
                var c3;
                var c4;
                
                c1 = board_[i][j];
                c2 = board_[i][j+1];
                c3 = board_[i][j+2];
                c4 = board_[i][j+3];
                
                if ( c1 != null && c2 != null && c3 != null && c4 != null )
                {
                    if ( c1.get_owner() == c2.get_owner() &&
                         c3.get_owner() == c4.get_owner() &&
                         c1.get_owner() == c4.get_owner())
                    {
                        c1.glow_on();
                        c2.glow_on();
                        c3.glow_on();
                        c4.glow_on();
                        status = true;
                    }
                }
            }
        }                   
        return status;
    }.bind(this);
    
    /**
     *  Check all vertical groupings of 4 checkers for a win.
     *  If four checkers are all equivalent, in a column, set them
     *  to "glowing" and return true.
     * 
     *  NOTE: we check all possible rows in case more than four
     *  checkers are involved in a win!
     * 
     */
    var check_vertical_win_condition=function()
    {
        var status  = false;
        for (var row=0; row < 3 ; row++)
        {
            for (var col=0; col<board_[0].length; col++)
            {
                var c1;
                var c2;
                var c3;
                var c4;
                
                c1 = board_[row  ][col];
                c2 = board_[row+1][col];
                c3 = board_[row+2][col];
                c4 = board_[row+3][col];
                
                if ( c1 != null && c2 != null && c3 != null && c4 != null )
                {
                    if ( c1.get_owner() == c2.get_owner() &&
                         c3.get_owner() == c4.get_owner() &&
                         c1.get_owner() == c4.get_owner())
                    {
                        c1.glow_on();
                        c2.glow_on();
                        c3.glow_on();
                        c4.glow_on();
                        status = true;
                    }
                }
            }
        }                   
        return status;
    }.bind(this);

    /**
     *  Check all diagnoal groupings of 4 checkers for a win.
     *  If four checkers are all equivalent, in a diagonal, set them
     *  to "glowing" and return true.  
     * 
     *  Note: we check both diagonals.
     * 
     *  NOTE: we check all possible rows in case more than four
     *  checkers are involved in a win!
     * 
     */
    var  check_diagonal_win_condition=function()
    {
        var status  = false;
        for (var row=0; row < 3; row++)
        {
            for (var col=0; col<4; col++)
            {
                var c1;
                var c2;
                var c3;
                var c4;
                
                c1 = board_[row  ][col];
                c2 = board_[row+1][col+1];
                c3 = board_[row+2][col+2];
                c4 = board_[row+3][col+3];
                
                if ( c1 != null && c2 != null && c3 != null && c4 != null )
                {
                    if ( c1.get_owner() == c2.get_owner() &&
                         c3.get_owner() == c4.get_owner() &&
                         c1.get_owner() == c4.get_owner())
                    {
                        c1.glow_on();
                        c2.glow_on();
                        c3.glow_on();
                        c4.glow_on();
                        status = true;
                    }
                }
                
                c1 = board_[row+3][col];
                c2 = board_[row+2][col+1];
                c3 = board_[row+1][col+2];
                c4 = board_[row  ][col+3];
                
                if ( c1 != null && c2 != null && c3 != null && c4 != null )
                {
                    if ( c1.get_owner() == c2.get_owner() &&
                         c3.get_owner() == c4.get_owner() &&
                         c1.get_owner() == c4.get_owner())
                    {
                        c1.glow_on();
                        c2.glow_on();
                        c3.glow_on();
                        c4.glow_on();
                        status = true;
                    }
                }
            }
        }                   
        return status;
    }.bind(this);
    
    /**
     *  Call the previuos three check functions.  If any 
     *  of them returns true, return true
     */
    var check_for_win = function( )
    {
        
        var horizontal  = check_horizontal_win_condition();
        var vertical    = check_vertical_win_condition();
        var diagonal    = check_diagonal_win_condition();
        
        return (horizontal || vertical || diagonal);
    }
    
    var board_           ; // 2D Array
    var player_1s_turn_  ; // boolean
    var game_over_       ; // boolean
    var piece_count_     ; // int
    
    
    player_1s_turn_   = true;
    game_over_        = false;
    piece_count_ = 0;
    
    board_ = new Array(6);
    for (var i=0;i<6; i++)
    {
        board_[i] = new Array(7);
    }

    var location; // where to place button

    var button;
    for (var col = 1; col<8; col++) 
    {                   
        button = new Button_Sprite(this, "Move", 60,30, button_event_handler, col, true);

	location = convert_to_pixel(6, col);
        button.x = location.x - button.width/2;
        button.y = location.y - 20;
    }
    
    button = new Button_Sprite(this, "Reset", 100, 50, reset, 0, true);
    button.x = -150;
    button.y = 100;

    create_display_list();

    this.updateLocalBounds();


}



/**
 * prepare the preloader assets for this file
 */
Connect_Four_Board.prepare_preload = function( loader )
{
    loader.set_preload_images("images/",     ["board.png"]);
}

















