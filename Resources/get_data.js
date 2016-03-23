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
    var chartNum = 0;

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
                chartNum = $('#formlist').val();
            },

        })
        .done( function ( data )
        {

            if (chartNum == 1) {
                var gpaChart = new Highcharts.Chart({
                    chart: {
                        type: 'column',
                        renderTo: 'gpaChart'
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

                gpaChart.addSeries({
                    name: data.name,
                    data: data.data
                });
            }

            if (chartNum == 2) {
                var advisorChart = new Highcharts.Chart({
                    chart: {
                        type: 'column',
                        renderTo: 'gpaChart'
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

                advisorChart.addSeries({
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
