$( function() {
    $( "#nose" ).draggable();
    $( "#mouth" ).draggable();
    $( "#eyes" ).draggable();
    $( "#hat" ).draggable();
  } );

let full = false;

function fullscreen() {
    if (!full) {
        $("#full").animate({ width: screen.width, height: screen.height }, 4000);
        full = true;
    }
}

function shrinkImage() {
    if (full) {
        $("#full").animate({ width: '20%', height: '10%' }, 4000);
        full = false;
    }
}


function screenshot() {
    const captureElement = document.querySelector("#drag-area");
  
    html2canvas(captureElement).then((canvas) => {
      const imageData = canvas.toDataURL("image/png");
  
      const link = document.createElement("a");
      link.setAttribute("download", "screenshot.png");
      link.setAttribute("href", imageData);
      link.click();
    });
  }