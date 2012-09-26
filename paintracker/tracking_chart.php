<?php

function print_page($user_id)
{
    connect_db();
	?>
      
        <script type="text/javascript">
        // declaring variables
        var chart;
        var dataProvider;
        var categories;
        // this method called after all page contents are loaded
        window.onload = function() {
            loadCSV("data.php"); 
            createChart();           
            // set data provider to the chart
            chart.dataProvider = dataProvider;
            // this will force chart to rebuild using new data           
            chart.validateData();                                  
        }
        // method which loads external data
        function loadCSV(file) {
            if (window.XMLHttpRequest) {
                // IE7+, Firefox, Chrome, Opera, Safari
                var request = new XMLHttpRequest();
            }
            else {
                // code for IE6, IE5
                var request = new ActiveXObject('Microsoft.XMLHTTP');
            }
            // load
            request.open('GET', file, false);
            request.send();
            parseCSV(request.responseText);
        }
          // method which parses a date string in the format YYYY-MM-DD and creates a Date object
          function parseDate(dateString, timeString) {
               // split the string get each field
               var dateArray = dateString.split("-");
               var timeArray = timeString.split("-");
               // now lets create a new Date instance, using year, month and day as parameters
               // month count starts with 0, so we have to convert the month number
               var date = new Date(Number(dateArray[0]), Number(dateArray[1]) - 1, Number(dateArray[2]), Number(timeArray[0]), Number(timeArray[1]), 0, 0);
               return date;
          }
        // method which parses csv data
        function parseCSV(data){
            //replace UNIX new line
            data = data.replace (/\r\n/g, "\n");
            //replace MAC new lines
            data = data.replace (/\r/g, "\n");
                      
            //split into rows
            var rows = data.split("\n");
            // create array which will hold our data:
            dataProvider = [];
            categories = [];
            categoryTypes = [];
            var cats = rows[0].split("|");
            for( var i = 0; i < cats.length; i++)
            {
                if( cats[i] )
                {
                    var cat = cats[i].split(",");
                    var catid = cat[0];
                    var catname = cat[1];
                    var cattype = cat[2];
                    categories[catid] = catname;
                    categoryTypes[catid] = cattype;
                }
            }
            // loop through all rows
            for (var i = 1; i < rows.length; i++){
                // this line helps to skip empty rows
                if (rows[i]) {                   
                    // our columns are separated by comma
                    var column = rows[i].split(":"); 
                    // column is array now
                    // first item is date + survey id
                    var firstItem = column[0].split(",");
                    var surveyId = firstItem[0];
                    var date = parseDate(firstItem[1], firstItem[2]);
                    // second item is category,value pairs
                    dataObject = {date:date, surveyId:surveyId};
                    var pairs = column[1].split("|");
                    for( var j = 0; j < pairs.length; j++)
                    {
                        // third item is value of the fird column
                        var pair = pairs[j].split(",");
                        var cat = pair[0];
                        var value = pair[1];
                        dataObject["category"+cat] = value;
                    }
                        // add object to dataProvider array
                    dataProvider.push(dataObject);
                }
            }
            
        }
        // method which creates chart
        function createChart(){
            // chart variable is declared in the top
            chart = new AmCharts.AmSerialChart();
            // here we tell the chart name of category
            // field in our data provider.
            // we called it "date" (look at parseCSV method)
            chart.categoryField = "date";
            // styles applied to the chart
            // default general color used in the chart
            chart.color = "#AAAAAA";
            // length of the animation
            chart.startDuration = 1;
            // margins between graph and canvas border
            chart.marginLeft = 15;
            chart.marginRight = 80;
            chart.marginBottom = 40;
            // now we have to set up the category axis to parse dates
            var catAxis = chart.categoryAxis;
            catAxis.parseDates = true;
            //catAxis.equalSpacing = true;
            // styles applied to the category axis
            // color of the axis line
            catAxis.axisColor = "#2d66bb";
            // color of the grid lines
            catAxis.gridColor = "#2d66bb";
            catAxis.minPeriod = "mm";
            // styles applied to value axis
            // we haven't set up a value axis until now,
            // so we create one and apply styles to it
            var valAxis = new AmCharts.ValueAxis();
            // we want to display the value axis on the right side
            valAxis.position = "right";
            // color of the axis line
            valAxis.axisColor = "#2d66bb";
            // as we set fillAlpha, and fillColor we don't want grid to be visible
            valAxis.gridAlpha = 0;
            // each second gap between grid lines will be filled with this color
            valAxis.fillColor = "#2d66bb";
            // fill alpha
            valAxis.fillAlpha = 0.1;
            // length of each dash
            valAxis.dashLength = 3;
            // and finally we add the value axis to the chart
            chart.addValueAxis(valAxis);
            var colorArray = [];
            colorArray[0] = "#dd1111";
            colorArray[1] = "#11dd11";
            colorArray[2] = "#1111dd";
            colorArray[3] = "#dddd11";
            colorArray[4] = "#dd11dd";
            colorArray[5] = "#11dddd";
            colorArray[6] = "#550000";
            colorArray[7] = "#005500";
            colorArray[8] = "#000055";
            colorArray[9] = "#222222";
            colorArray[10] = "#771111";
            colorArray[11] = "#117711";
            colorArray[12] = "#111177";
            colorArray[13] = "#777711";
            colorArray[14] = "#771177";
            colorArray[15] = "#117777";
            var color = 0;
            for( var cat in categories )
            {
            
            
                // chart must have a graph
                var graph = new AmCharts.AmGraph();
                // graph should know at what field from data
                // provider it should get values.
                // let's assign value1 field for this graph
                graph.valueField = "category"+cat;
                graph.title = categories[cat];
                // and add graph to the chart
                // styles applied to the graph line
                // color of the graph line
                graph.lineColor = colorArray[color];
                color++;
                // thicknes of the graph line
                graph.lineThickness = 2;
                // show round bullets for each point
                graph.bullet = "round";
                graph.bulletSize = "12";
                // length of each dash
                graph.dashLength = 1;
                graph.balloonText = categories[cat]+": [[category"+cat+"]]";
                
                
                if( categoryTypes[cat] != "Daily Wellbeing" )
                {
                    graph.hidden=true;
                }
                
                chart.addGraph(graph);
              
                
            }
            // 'chartdiv' is id of a container
            // where our chart will be     
                    chart.addListener("clickGraphItem", handleClick);


// CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorPosition = "mouse";
                chart.addChartCursor(chartCursor);
                chartCursor.bulletsEnabled = false;
                chart.balloon.showBullet = false;

                // SCROLLBAR
                var chartScrollbar = new AmCharts.ChartScrollbar();
                chart.addChartScrollbar(chartScrollbar);

                // LEGEND
                var legend = new AmCharts.AmLegend();
                legend.marginLeft = 110;
                chart.addLegend(legend);            
            chart.write('chartdiv');
        }
        
        function handleClick(e)
        {
            if (window.XMLHttpRequest) {
                // IE7+, Firefox, Chrome, Opera, Safari
                var request2 = new XMLHttpRequest();
            }
            else {
                // code for IE6, IE5
                var request2 = new ActiveXObject('Microsoft.XMLHTTP');
            }
            // load
            request2.open('GET', "dailydata.php?survid="+e.item.dataContext.surveyId, false);
            request2.send();
            document.getElementById("chartunderdiv").innerHTML = request2.responseText;      
        }
        </script>

        
	    <div class="ptright">
<p>Measures of your well-being are displayed below so you can see how you are doing overtime.</p>
<p>To look at the relationship between your well-being and any other factors, activate their boxes.</p>
<p>You can explore the relationships among factors by selecting what you want to display.</p>
<p>For a fuller report, click on a circle from the desired date.</p>
<div id="chartdiv" style="width:600px; height:400px; background-color:#FFFFFF"></div>
<div id="chartunderdiv" style="width:600px; height:400px; background-color:#FFFFFF"></div></div>
<div style="clear:both;">&nbsp;</div>
<p style="text-align:center"><img src="pen.gif"></p>
</div>
<?php
}