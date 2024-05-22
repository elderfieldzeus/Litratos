function appear() {
    const dialog = document.querySelector(".dialog");
    dialog.show();
}

function hide() {
    const dialog = document.querySelector(".dialog");
    dialog.close()
}

function imagePopUp() {
    const images = document.querySelectorAll(".images");
    const dialogs = document.querySelectorAll(".pop_up_dialog");

    images.forEach((image, index) => {
        image.addEventListener("click", () => {
            dialogs[index].show();
        });
    });

    dialogs.forEach((dialog) => {
        //exit
        dialog.children[0].children[1].children[0].addEventListener("click", () => {
            dialog.close();
        });

        responsivePop(dialog.children[0]);

    })
}

// function popUp(source) {
//     const body = document.querySelector("body");

//     const dialog = document.createElement("dialog");

//     const main = document.createElement("div");

//     const left_div = document.createElement("div");
//     const right_div = document.createElement("div");

//     const img = document.createElement("img");
    
//     const delete_icon = document.createElement("span");
//     const download_icon = document.createElement("span");
//     const exit_icon = document.createElement("span");

//     addClasses(dialog, main, left_div, right_div, img, delete_icon, download_icon, exit_icon);

//     img.src = source;
//     img.style.maxBlockSize = "40vw";
//     img.style.maxWidth = "40vw";

//     right_div.innerHTML = "<?php include '../php/popup.php ?>'";

//     addPopListeners(dialog, exit_icon);

//     body.prepend(dialog);
//     dialog.append(main);
//     main.appendChild(left_div);
//     main.appendChild(right_div);
//     left_div.appendChild(img);
//     right_div.appendChild(exit_icon);
//     right_div.appendChild(download_icon);
//     right_div.appendChild(delete_icon);

//     dialog.close();

//     return dialog;
// }

// function addPopListeners(dialog, exit) {
//     exit.addEventListener("click", () => {
//         dialog.close();
//     });
// }

// function addClasses(dialog, main, left_div, right_div, img, delete_icon, download_icon, exit_icon) {
//     dialog.classList.add("pop_up_dialog");

//     main.classList.add("pop_up_main");

//     left_div.classList.add("pop_up_left");
//     right_div.classList.add("pop_up_right");

//     img.classList.add("pop_up_image");

//     delete_icon.classList.add("pop_up_delete");
//     download_icon.classList.add("pop_up_download");
//     exit_icon.classList.add("pop_up_exit");
// }

function responsivePop(main) {
    const height = window.innerHeight;
    const width = window.innerWidth;

    if(height > width) {
        main.style['flex-direction'] = "column";
        main.children[1].children[0].style.backgroundColor = "white";
        main.children[0].append(main.children[1].children[0]);
    }
    else { 
        main.style['flex-direction'] = "row";
    }
}

imagePopUp();