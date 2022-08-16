
// let get_api_token = document.querySelector("#get_api_token")
// let api_token = get_api_token.innerText.slice(9, 9+100)
// const api_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiZGQ5M2ZlMjAxMDBhZjgxMTcxYzBiNTA3N2JjZjY0NzdlZDY3ZTlkNjk4NTFjYjJlZjBlNGJlOTJhYTIwMjUwNWMyMjc2YmUzNDk4MTIyN2EiLCJpYXQiOjE2NTk2Mjc3NjIuOTI5NTk0LCJuYmYiOjE2NTk2Mjc3NjIuOTI5NTk2LCJleHAiOjE2OTExNjM3NjIuOTIzNiwic3ViIjoiMSIsInNjb3BlcyI6W119.tdfdLRp8Dv0f1Qtp8mf3X7OFPgbQXzLltrqFuLglFUocAbYYKMoC_BWD4BJ6BNWKdc49TAynYoPoQ-mels0_UzV7a1LJHNKQRiyPDT_WnQo_ztZ9ztH70e8jSivl6PfYNUXSPDSAjO560psn0YcChV9vVBBHQtx2yHEihRf6qL1EOtI8dgfzO_W2H0eEbJBft_kfAgM5t2QzJB41CyZs7SmaHtBGXp_DW8v51AmwMcM_4pJQbQoOsUTVnGeLzJgCA4Pf_fxRobc4SE2DW3Wj9xYoxMSTB12uK6K0Hpt2d9kzpoS6M4KN-IdHl9Og5MvGEujQpPAX_Az4zbM3dOnsw_deUSrCfi4Lz64GeGx-Fspr32-IlMDcIHW_YMBmUD3K5kcXeCPvl79LgAyXUrRnMFscL28nIcN5pd1NmqqM1J8qNAloHjowrSGN5JwFrRN14mdDMPTvzbY4KNWmadLpAewKalgXX-RwzL5uPVUpPSEvrgm5Cf1mDvryQdT4wLhzhD9sEKTwW5nxC6qFQ-v45VzM2JL7DN65OkI7F5owBYvJaqjE0RFAUWxHTlATb_tiYRlZM_GvR1LjOKDYmZooto1G18o4b2c7OHEkL-AWKJYZzGB_LtEweW-uojOFsN2RTAPTOTjbjycB-FoA-hg2cvj4dXONw2URAgJ2TAG9o1M"
// get_api_token.innerHTML = ""

const check_counting_fun = () => {
    let date_begin = document.querySelector("#begin")
    let date_end = document.querySelector("#end")

    if(date_begin.value == "" || date_end.value == ""){
        alert("Wrong input")
    }else if(Date.parse(date_begin.value) >= Date.parse(date_end.value)){

        
        alert("The beginning date cannot over the ending date.")
    }
    else{
        get_counting_date(date_begin.value, date_end.value)

    }

}

const drawing_graph = (data) => {
    
    let dates = []
    let message_nums = []
    let reply_nums = []

    for(let idx=0; idx<data.length; idx++){
        dates.push(data[idx].date)
        message_nums.push(data[idx].message_num)
        reply_nums.push(data[idx].reply_num)
    }

    Highcharts.chart("graph", {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Numbers of message'
        },
        xAxis: {
            categories: dates
        },
        yAxis: {
            title: {
                text: 'Number',
                size: "16px"
            }
        },
        series: [{
            name: 'New Message Numbers',
            data: message_nums,
            color: "red"
        },
        {
            name: 'Reply Message',
            data: reply_nums,
            color: "blue"
        }]
    });

}



const get_counting_date = async(beginning_date, ending_date) => {
    // let result = await axios.get(`/api/get_counting_num/${beginning_date}/${ending_date}`)
    // console.log(result.data)
    // drawing_graph(result.data)
    const get_counting_data_instance = axios({
        url: `/api/get_counting_num/${beginning_date}/${ending_date}`,
        method: 'get',
        headers: {
            "Authorization": "Bearer "+ api_token
        },       

    })

    get_counting_data_instance
    .then( (res) => {
        drawing_graph(res.data)
    })
}


export { check_counting_fun, drawing_graph, get_counting_date};