<?php

function print_page($user_id) {
    connect_db();
    ?>

    <script type='text/javascript'>
                                            
        var options = {
            chart: {
                renderTo: 'container',
                type: 'line',
                zoomType: 'x',
                marginRight: 130,
                marginBottom: 40
            },
            title: {
                text: 'Paintracker',
                x: -20 //center
            },
            xAxis: {
                gridLineWidth: 1,
                lineColor: '#000',
                tickColor: '#000',
                title: {
                    text: ""
                },
                type: 'datetime',
                dateTimeLabelFormats: {
                    day: '%b %e'
                }
            },
            yAxis: {
                minorTickInterval: 'auto',
                lineColor: '#000',
                lineWidth: 1,
                min: 0,
                max: 100,
                tickWidth: 1,
                tickColor: '#000',
                tickInterval: 10,
                labels: {
                    enabled: false
                },
                title: {
                    text: ""
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b> - ' + Highcharts.dateFormat('%b %e, %Y', this.x) + '<br/>' + this.point.actualvalue
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: []
        };
                                
        // Converts SQL datetime values into UTC seconds
        function convertDate(dateString) {
            // Split into date and time values
            var temp = dateString.split(" ");	
            var date = temp[0].split("-");
            var time = temp[1].split(":");

            // convert to UTC time
            var dateValue = Date.UTC(Number(date[0]), Number(date[1])-1,Number(date[2]),Number(time[0]),Number(time[1]),Number(time[2]),0);
            return dateValue;
        }

        $(document).ready(function() {               
                                                 
            $.get('http://wwwx.cs.unc.edu/Courses/comp523-f12/paintracker/data.php', function(data) {
                                                    
                //replace UNIX new line
                data = data.replace (/\r\n/g, "\n");
                //replace MAC new lines
                data = data.replace (/\r/g, "\n");
                                                          
                //split into lines
                var lines = data.split("\n");
                                                        
                // Iterate over the lines and add categories or series
                $.each(lines, function(lineNo, line) {
                    var items = line.split(',');
                                    			
                    // First line, contains list of categories
                    if (lineNo == 0) {
                                                                
                        // For each value in the first line
                        $.each(items, function(itemNo, item) {
                            // Create a new data series for each category
                            var categoryData = {
                                data: []
                            };
                            
                            // If first value, specify it as a note marker
                            if (itemNo == 0) {
                                categoryData.lineWidth = 0;
                            }
                            
                            categoryData.name = item;
                            options.series.push(categoryData);
                        });
                                                                
                    }
                    else {
                                    
                        // variables
                        var categoryID;
                        var datetime;
                        var actualvalue;
                        var relativevalue;

                        // For each separate value in the line
                        $.each(items, function(itemNo, item) {

                            // first value is category ID
                            if (itemNo == 0) categoryID = Number(item);
                            // second value is relative value
                            if (itemNo == 1) relativevalue = Number(item);
                            // third value is actual value
                            if (itemNo == 2) actualvalue = item;
                            // fourth value is date time
                            if (itemNo == 3) datetime = convertDate(item);
                		
                        });
                                    
                        // create an entry for the specified date/value
                        var dataValue = {};
                        dataValue.x = datetime;
                        dataValue.y = relativevalue;
                        dataValue.actualvalue = actualvalue;

                        // push data onto the correct category
                        options.series[categoryID].data.push(dataValue);
                             
                    }

                });
                                    
                // Sort all values by time
                for (var i = 0; i < options.series.length; i++) {
                    options.series[i].data.sort(function(a,b) {return a.x - b.x});
                }
                    
                // Create chart
                var chart = new Highcharts.Chart(options);
                                    
            });
                                                    
        });

    </script>
    <div class="ptright">
        <p>Measures of your well-being are displayed below so you can see how you
            are doing overtime.</p>
        <p>To look at the relationship between your well-being and any other factors,
            activate their boxes.</p>
        <p>You can explore the relationships among factors by selecting what you
            want to display.</p>
        <p>For a fuller report, click on a circle from the desired date.</p>
        <div
            id="container" style="width:800px; height:600px; background-color:#FFFFFF"></div>
        <div id="chartunderdiv" style="width:800px; height:600px; background-color:#FFFFFF"></div>
    </div>
    <div style="clear:both;">&nbsp;</div>
    <p style="text-align:center">
        <img src="pen.gif">
    </p>
    </div>
    <?php

}