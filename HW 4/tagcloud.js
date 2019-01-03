function makeCloud(){

     textContent=document.getElementById("tags").value;
     //parse that string into an array of tag strings, sorted by lexicographic ordering.
     var arr=textContent.split(" ");
     arr.sort();
    
     //Create two arrays: One array contains unique tags 
     //and second corresponding array will contain the frequencies of each of those tags.
      tags_array=new Array();
      freq_array=new Array();
    tags_array.push(arr[0]);
    freq_array.push(1);
    var j=0;
    
     for(var i=1; i<arr.length; i++)
     {          
            if(arr[i]==tags_array[j]){
                freq_array[j]++;
            }
        
            else
            { j++;
              freq_array[j]=1;
              tags_array[j]=arr[i];  
             }            
     }
   //   alert(tags_array[0]);
   //   alert(tags_array.length+"");
   //   alert(freq_array.length+"");
     
 //5.keep track of the maximum frequency for the set of tags. (Write a helper function to compute this.)
  
  var index=findMax();
  //alert(index);
  MaxFrequency=freq_array[index];
  //alert(MaxFrequency);

//6.create a div element containing all the tags as span elements as described above.  
 tags_to_span();
//7. use the properties of the DOM address for the div element 
//to set a .1em solid silver border for the div. Give the div a blue background. 
//a silver foreground color, and an extra large serif font.

divObj.style.border=".1em solid silver";
divObj.style.backgroundColor="blue";
divObj.style.fontFamily="serif";
divObj.style.fontSize = "x-large";
divObj.style.color="silver";

//8.loop through all the span child elements (the tags) in the div (tag cloud) and 
//assign a suitable font size to them.

determineSize();

//9. Add onclick function to each span element.
 for (var i=0; i < divObj.childNodes.length; i++)
{
   divObj.childNodes[i].onclick = tag_alert;
}
    
//10. remove the div element already belonging to tagcloud.html and 
//replace it with the new div you just created. 
//The new div should be in the same position in the DOM tree as the old div was.
old_div=document.getElementsByTagName("div")[0];
old_div.parentNode.replaceChild(divObj, old_div);

}

function saveCloud(){
//save the contents of the textarea as a cookie.
document.cookie = "my_cookie= " + document.getElementById("tags").value;
}

function loadCloud(){

 // should load the contents of a previously saved cookie into the textarea. 
    cookie_array = document.cookie.split(";");
 //get the last cookie
   for(var i=cookie_array.length; i>0; i--)
   {  
    var cookie = cookie_array[i-1];
    cookie_data_array = cookie.split("=");
    cookie_name = cookie_data_array[0];
    cookie_value = cookie_data_array[1];
      if(cookie_name=="my_cookie")
      {  
       document.getElementById("tags").value=cookie_value;
       return;
      }
   }
}



function clearArea(){
//The "Clear TextArea" button should erase the contents of the textarea.
    document.getElementById("tags").value="";

}


function tag_alert(){
      var num;
      tagName=this.innerHTML;
      tagName=tagName.substring(0, tagName.length-1);
      //alert(tagName+"11111");
    for(var i=0; i<tags_array.length; i++)
    {
       if(tagName==tags_array[i]) 
           num=i;  
    }
    
    alert(tagName+": "+freq_array[num-0]+" occurrences");

}

function determineSize(){

     for(var i=0; i<freq_array.length; i++)
    {
        frequency=freq_array[i];
        font_size= Math.round(((frequency-0)/(MaxFrequency-0))*20)+15;
        font_string=font_size+"pt"; 
        divObj.childNodes[i].style.fontSize = font_string;
        
    }

}

function findMax(){
    var Maxindex=0; 
    var MaxEl=freq_array[0];
    for (var i=0; i<freq_array.length; i++)
    {  if(freq_array[i]>MaxEl)
        { MaxEl=freq_array[i];
          Maxindex=i;}    
    }
   return Maxindex;
}

function tags_to_span(){
          divObj=document.createElement("div");
         for(var i=0; i<tags_array.length; i++)
         {
           spanObj=document.createElement("span");
           spanObj.innerHTML=tags_array[i]+" ";
           divObj.appendChild(spanObj);
         
         }
}



