import './bootstrap';
import Choices from 'choices.js';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();




//Create Multiple select Element
window.choices =(element)=>{
    return new Choices(element,{
        maxItemCount:4, removeItemButton: true
    });
}