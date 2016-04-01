/**
 * Created by Fumiko on 3/31/2016.
 */

function find_data(  )
{
    var name = document.getElementById("name").value;
    var score = document.getElementById("scoreValue").value;

    alert("Name is : " + name);

    $.ajax(
        {
            type:'POST',
            url: "get_data.php",
            data: { var1: name, var2: score },
            dataType: "html",  		      // The type of data that is getting returned.

            /**
             * What to do before the ajax request is sent. Perhaps gather
             * page information, prep form, etc.
             */
            beforeSend: function()
            {

            }

        })
        .done( function ( data )
        {
            console.log('TOBIN MADE IT HERE' );

            console.log('DATA is ' + data);

            var jContent = $( "#table" ); // put data here
            jContent.html( data );

        } )
        .fail( function ( text, options, err )
        {
            /**
             * What to do if there is an error
             *
             */
            // something went wrong
            var jContent = $( "#content" );
            jContent.html(text + "   " + options +"   " + err);
            console.log('Tobin, error message: ' + text );
            console.log('Tobin, error message: ' + options );
            console.log('Tobin, error message: ' + err);
        } )
        .always( function ( )
        {
            /**
             * What to do no matter what
             *
             */
            console.log('Tobin, cleaning up');
        } );

    return false;
}

