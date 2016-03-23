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

//define([
//    'Highcharts/api/js/jquery-1.11.3.min',
//    'Highcharts/js/highcharts.src',
//]);

function find_data(  )
{

    var data_series = {};

    $.ajax(
        {
            type:'POST',
            //url:  $("input[name=cause_error]").is(':checked') ? "asdf" : "get_data.php",
            url: "../../../../Resources/get_data.php",
            data: $('#form_id').serialize(),
            dataType: "json",  		      // The type of data that is getting returned.

            success: function(response)
            {
                // note: this function should be removed and use only the done function below
                console.log("success function");
            },

            /**
             * What to do before the ajax request is sent. Perhaps gather
             * page information, prep form, etc.
             */
            beforeSend: function()
            {
                //var check_box = $("input[name=before_send]");
                //
                //if (check_box.is(':checked'))
                //{
                //    alert ( "prepping AJAX call with data: " + $('#form_id').serialize() );
                //}

            },

        })
        .done( function ( data )
        {
                var weightchart = new Highcharts.Chart({
                    chart: {
                        type: 'column',
                        renderTo: 'linechart'
                    },
                    title: {
                        text: 'GPAs',
                        x: -20 //center
                    },
                    subtitle: {
                        text: 'Source: Jim',
                        x: -20
                    },
                    xAxis: {
                        title: 'credit_hours',
                    },
                    yAxis: {
                        min: 0, max: 4,
                        title: {
                            text: 'GPA'
                        },
                        plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                        borderWidth: 0
                    }
                });

            weightchart.addSeries({
                name: data.name,
                data: data.data
            });
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
            jContent.html(text + "   " + options +"   " + err);
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
    //return false;
}
