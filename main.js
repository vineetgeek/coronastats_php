$(document).ready(function() {
    //get json data from URL API
    $.getJSON("https://api.covid19india.org/data.json", function(data) {
        var states = [];
        var confirmed = [];
        var recovered = [];
        var deaths = [];


        var total_confirmed;
        var total_active;
        var total_recovered;
        var total_deaths;


        total_confirmed = data.statewise[0].confirmed;
        total_active = data.statewise[0].active;
        total_recovered = data.statewise[0].recovered;
        total_deaths = data.statewise[0].deaths;



        $("#confirmed").append(total_confirmed);
        $("#active").append(total_active);
        $("#recovered").append(total_recovered);
        $("#deaths").append(total_deaths);


        var daily_confirmed;
        var daily_recovered;
        var daily_deaths;
        var last_updated;

        daily_confirmed = data.statewise[0].deltaconfirmed;
        daily_recovered = data.statewise[0].deltarecovered;
        daily_deaths = data.statewise[0].deltadeaths;
        last_updated = data.statewise[0].lastupdatedtime;


        $("#dailyconfirmed").append(daily_confirmed);
        $("#dailyrecovered").append(daily_recovered);
        $("#dailydeaths").append(daily_deaths);
        $("#lastupdatedtime").append(last_updated);

        //new graph

        var daily_confirmed2;
        var daily_recovered2;
        var daily_deaths2;

        daily_confirmed2 = data.statewise.deltaconfirmed;
        daily_recovered2 = data.statewise.deltarecovered;
        daily_deaths2 = data.statewise.deltadeaths;








        // console.log(data.statewise);

        $.each(data.statewise, function(id, obj) {
            states.push(obj.state);
            confirmed.push(obj.confirmed);
            recovered.push(obj.recovered);
            deaths.push(obj.deaths);
        })

        states.shift();
        confirmed.shift();
        recovered.shift();
        deaths.shift();




        //chart integrations

        var mychart = document.getElementById("mychart").getContext('2d');

        var chart = new Chart(mychart, {
            type: 'horizontalBar',
            data: {
                labels: states,
                datasets: [{
                        label: "Confirmed",
                        data: confirmed,
                        backgroundColor: 'rgba(255,0,255,0.3)',
                    },
                    {
                        label: "Recovered",
                        data: recovered,
                        backgroundColor: 'rgba(0,255,0,0.3)',

                    },
                    {
                        label: "Deaths",
                        data: deaths,
                        backgroundColor: 'rgba(255,0,0,0.3)',

                    },

                ]
            },

        })





    });
});