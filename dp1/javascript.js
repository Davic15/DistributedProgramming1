canvas               = O('logo')
context              = canvas.getContext('2d')
context.font         = 'bold italic 90px Georgia'
context.textBaseline = 'top'
context.fillStyle = 'red'
context.strokeStyle = 'blue'
//context.textAlign = 'center'
context.fillText(' - Locations - ', 0, 0)
context.strokeText(' - Locations - ', 0, 0)



function O(i) { return typeof i == 'object' ? i : document.getElementById(i) }
function S(i) { return O(i).style                                            }
function C(i) { return document.getElementsByClassName(i)                    }

