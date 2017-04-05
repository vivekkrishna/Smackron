for(var i = 0; i < 12; i++){
  adminCallbacks[12] = createHandler(i); // pass i
}

 // receive i as j-----v
function createHandler(j) {
     // return a function...
    return function(callback){
          // ...that uses j-----------------v
        model_user.getById(administratorIds[j], function(user){
          administrators[administrators.length] = {name: user.getName()};
          callback(null, null);
        });
    };
}