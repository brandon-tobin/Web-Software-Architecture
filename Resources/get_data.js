/**
 *
 *  Author: H. James de St. Germain
 *  Date:   Spring 2016
 *
 *  Make an AJAX request for data using the new jquery:
 *
 *    done and fail and always
 *
 *  deferred function syntax
 *
 */

//
//
//
function find_data(  )
{

    $.ajax(
        {
            type:'POST',
            //url:  $("input[name=cause_error]").is(':checked') ? "asdf" : "get_data.php",
            url: "get_data.php",
            data: $('#form_id').serialize(),
            dataType: "html",  		      // The type of data that is getting returned.

            /*success: function(response)
            {
                // note: this function should be removed and use only the done function below
                console.log("success function");
            },*/

            /**
             * What to do before the ajax request is sent. Perhaps gather
             * page information, prep form, etc.
             */
            beforeSend: function()
            {
                var check_box = $("input[name=before_send]");

                if (check_box.is(':checked'))
                {
                    alert ( "prepping AJAX call with data: " + $('#form_id').serialize() );
                }

            },

        })
        .done( function ( data )
        {
            //console.log("done function")
            //var check_box = $("input[name=on_success]");
            //
            ///**
            // * What to do when the data is successfully retreived
            // */
            //if (check_box.is(':checked'))
            //{
            //    alert ( "Data Rerturned Successfully!" );
            //}

            var jContent = $( "#content" ); // put data here
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
            //jContent.html( "<h2>Error - Only a programmer can fix this!! </h3>"  );
            jContent.html(err);
            console.log('Jim, error message: ' + text );
            console.log('Jim, error message: ' + options );
            console.log('Jim, error message: ' + err);
        } )
        .always( function ( )
        {
            /**
             * What to do no matter what
             *
             */
            console.log('Jim, cleaning up');
        } );



    // if this
    // disable a page submit
    return false;
}