/**
 *
 *  Author: Brandon Tobin
 *  Date:   Spring 2016
 *
 *  Make an AJAX request for data using the new jquery:
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
            url: "../../../../Resources/get_data.php",
            data: $('#form_id').serialize(),
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
                chartNum = $('#formlist').val();
            },

        })
        .done( function ( data )
        {

            if (chartNum == 1) {
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

            if (chartNum == 2) {
                var advisorChart = new Highcharts.Chart({
                    chart: {
                        type: 'line',
                        renderTo: 'chart'
                    },
                    title: {
                        text: 'Number of Students by Advisor',
                        x: -20 //center
                    },
                    subtitle: {
                        x: -20
                    },
                    xAxis: {
                        title: {
                            text: 'Advisors'
                        },
                        type: 'category'
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Number of Students'
                        },
                        plotLines: [{
                            value: 0,
                            width: 3,
                            color: '#808080'
                        }]
                    },
                    colors: ['#C43737'],

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

            if (chartNum == 3) {
                var studentCompletionChart = new Highcharts.Chart({
                    chart: {
                        type: 'pie',
                        renderTo: 'chart'
                    },
                    title: {
                        text: 'Number of Activities Students Have Completed',
                        x: -20 //center
                    }
                });

                studentCompletionChart.addSeries({
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
