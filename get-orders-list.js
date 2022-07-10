ordersListId = document.querySelector("#id");
ordersListCreateTime = document.querySelector("#create_time");
ordersListName = document.querySelector("#name");


$.ajax({
    method: "POST",
    url: "/php/mfee27_group2_project/orders-api.php",
    dataType: "json",
    data: { 
        id: id,
        name: name,
        create_time:create_time
     }
    })
    .done(function( response ) {
        console.log(response);
        ordersListId.innerText=response.id;
        ordersListCreateTime.innerText=response.create_time;
        ordersListName.innerText=response.name;
        

    }).fail(function( jqXHR, textStatus ) {
        console.log( "Request failed: " + textStatus );
    });