var btn=document.getElementById("btn");
//btn.addEventListener("click", function(){
        var myrequest=new XMLHttpRequest;
        myrequest.open('GET','https://github.dev/BenKekwandi/benoitkeks.github.io/blob/main/data.json');
        myrequest.onload= function(){
                var dt=loadJSON("data.json");
                //var ourData= JSON.parse(myrequest.responseText);
                var ourData= JSON.parse(dt);
                console.log(ourData[0]);
                //renderHtml(ourData);
        }

        //myrequest.send();
//});
/*function renderHtml(Data)
{
    for(i=0;i<Data.length;i++)
    { 
        bigstring="<p> last name:" + Data[i].last_name + "</p><br>" + "<p> email:" + Data[i].email + "</p><br>" + "<p> address:" + Data[i].address + "</p><br>" ;
        content.insertAdjacentHTML('beforeend',bigString);
    }
    

}*/
