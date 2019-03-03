/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function animationPlaceholderLabel(){
    
    $('input').focus(function(){
        $(this).parents('.box-input').addClass('focused');
    });
    
    $('input').blur(function(){
        $(this).parents('.box-input').removeClass('focused');  
    }) 
};

animationPlaceholderLabel()
                    