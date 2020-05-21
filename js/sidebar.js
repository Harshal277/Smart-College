var iscollapsed = true

    function collapse_sidebar() {
        if (iscollapsed) {
            document.getElementById("college-logo").classList.remove("logo-side")
            document.getElementById("app").classList.remove("short-app")
            document.getElementById("app").classList.add("full-app")

            var side = document.getElementById("side-bar")
            side.classList.remove("hide-side")

            var itemIcon = document.querySelectorAll(".item-icon")
            for (var i = 0; i < itemIcon.length; i++) {
                itemIcon[i].classList.remove("hide-icon");
            }

            var menuIcon = document.querySelectorAll(".menu-item")
            for (var i = 0; i < menuIcon.length; i++) {
                menuIcon[i].classList.remove("hover-item");
            }
            
            var itemTitle = document.querySelectorAll(".item-title")
            for (var i = 0; i < itemTitle.length; i++) {
                itemTitle[i].classList.remove("hide-title");
            }

            var btn = document.getElementById("btn-side-icon")
            btn.classList.remove("fa-chevron-right")
            btn.classList.add("fa-chevron-left")
         
            iscollapsed = false
            console.log("Side bar not collapsed")
        } 
        else 
        {
            document.getElementById("college-logo").classList.add("logo-side")
            document.getElementById("app").classList.remove("full-app")
            document.getElementById("app").classList.add("short-app")

            var side = document.getElementById("side-bar")
            side.classList.add("hide-side")

            var itemIcon = document.querySelectorAll(".item-icon")
            for (var i = 0; i < itemIcon.length; i++) {
                itemIcon[i].classList.add("hide-icon");
            }

            var menuIcon = document.querySelectorAll(".menu-item")
            for (var i = 0; i < menuIcon.length; i++) {
                menuIcon[i].classList.add("hover-item");
            }

            var itemTitle = document.querySelectorAll(".item-title")
            for (var i = 0; i < itemTitle.length; i++) {
                itemTitle[i].classList.add("hide-title");
            }

            var btn = document.getElementById("btn-side-icon")
            btn.classList.remove("fa-chevron-left")
            btn.classList.add("fa-chevron-right")
          
            iscollapsed = true;
            console.log("Side bar collapsed")
        }
    }