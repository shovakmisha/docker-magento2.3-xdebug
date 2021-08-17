define (['uiElement'], function ( UiElement ){
    return UiElement.extend ({
        defaults :{
            helloWorld :" Hello World "
        },
        sayHello : function (){
            console.log(this.message );
        },
        getLines : function (){
            return ['You say yes ', 'I say no ', 'You say stop ', 'I say go go go '];
        }
    });
});
