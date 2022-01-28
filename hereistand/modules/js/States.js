define(['dojo', 'dojo/_base/declare'], (dojo, declare) => {
  return declare('hereistand.states', null, {
    onEnteringStateImpulseActions(args){
      console.log(args);
    },
  });
});
