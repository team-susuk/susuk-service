const IntervalNotification = Number(document.querySelector('meta[name="notification-interval"]').getAttribute("content")),
    AdminBaseUrl = document.querySelector('meta[name="admin-base-url"]').getAttribute("content"),
    ShowNotification = Boolean(document.querySelector('meta[name="app-notification"]').getAttribute("content")),
    AjaxPath = document.querySelector('meta[name="app-notification-path"]').getAttribute("content");
// if (ShowNotification) {
//     loadNotification(), IntervalNotification && setInterval((function() {
//         loadNotification()
//     }), 1e3 * IntervalNotification);
//     const t = document.querySelector(".header-navigation .notification .dropdown-notification");

//     function loadNotification() {
//         fetch(`${AdminBaseUrl}/${AjaxPath}`, {
//             method: "GET"
//         }).then((async n => {
//             if (200 == n.status) {
//                 const e = await n.json(),
//                     i = document.querySelector(".notification-list #notification-list-items");
//                 if (t.querySelector(".count").innerHTML = e.total, e.items.length) {
//                     t.querySelector(".icon").classList.remove("d-none"), t.querySelector(".new").classList.remove("d-none");
//                     let n = "";
//                     for (let [t, i] of e.items.entries()) n += `<li class="items">\n                            <a href="${AdminBaseUrl}/notification-admin/read/${i.uuid}" class="d-flex unread">\n                                <div class="icons">\n                                    <i class="isax-b icon-notification-bing"></i>\n                                </div>\n                                <div class="d-flex flex-column">\n                                    <p class="title">${i.title}</p>\n                                    <span class="desc">${i.description}</span>\n                                    <span class="date">${i.date}</span>\n                                </div>\n                            </a>\n                        </li>`;
//                     i.innerHTML = n
//                 } else i.innerHTML = '<li class="items empty-notification">\n                        <span>You don\'t have notification</span>\n                    </li>', t.querySelector(".icon").classList.add("d-none"), t.querySelector(".new").classList.add("d-none")
//             }
//         }))
//     }
// }