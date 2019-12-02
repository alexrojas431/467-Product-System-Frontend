// Adds quantity to the order; Dependent if user added

function addItem(partNum, price, quan)
{

    var i = 1
    loc = 0;
    
    while( (i < shoppingList) && (shoppingList[i].partNum != partNum) )
    {
      i ++;
       if (shoppingList[i].partNum == partNum)
       {
        loc = i
       }
       else
       {
        loc = -1;
       }
    }

    if (loc != -1){
        // update existing item
        olditem =  itemlist[loc].quan
        //alert(' loc is before oldvalue ' + loc);
        //alert('olditem is ' + olditem);
        itemlist[loc] = new product(codes,prices,descrip,olditem + 1,url)}
          else // new item
          {
              olditem =  shoppingList[item_num].quan
              shoppingList[item_num] = new product(codes,prices,descrip,olditem + 1,url);
              items_ordered = item_num
              item_num = item_num + 1
          }

}

// Visually changes counter in HTML

function itemCounter(partNum)
{
    var counter = shoppingList[location].counter
}