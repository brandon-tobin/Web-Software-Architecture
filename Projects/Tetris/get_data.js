/**
 * Created by Fumiko on 3/31/2016.
 */

function find_data(  )
{
    var state = 0;

    $.ajax(
        {
            type:'POST',
            url: "get_data.php",
            data: $('#nameSubmit').serialize(),
            dataType: "json",  		      // The type of data that is getting returned.

            //success: function(response)
            //{
            //    // note: this function should be removed and use only the done function below
            //    console.log("success function");
            //},

            /**
             * What to do before the ajax request is sent. Perhaps gather
             * page information, prep form, etc.
             */
            beforeSend: function()
            {
                // Determine which form we are dealing with
                state = $('#state').val();
            }

        })
        .done( function ( data )
        {

            // Check to see if the selected chart is the GPA Column Chart
            // If so, set the options for the correct highchart



                var gpaChart = new Highcharts.Chart({
                    chart: {
                        type: 'column',
                        renderTo: 'chart'
                    },
                    title: {
                        text: 'Student GPAs',
                        x: -20 //center
                    },
                    subtitle: {
                        x: -20
                    },
                    xAxis: {
                        title: {
                            text: 'GPAs'
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Count'
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

                gpaChart.addSeries({
                    name: data.name,
                    data: data.data
                });
            }

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
}

