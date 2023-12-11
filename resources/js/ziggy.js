const Ziggy = {"url":"http:\/\/localhost:8000","port":8000,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"welcome":{"uri":"\/","methods":["GET","HEAD"]},"guide.login":{"uri":"guide\/login","methods":["GET","HEAD"]},"guide.register":{"uri":"guide\/register","methods":["GET","HEAD"]},"guide.home":{"uri":"guide","methods":["GET","HEAD"]},"guide.merchants.index":{"uri":"guide\/merchants","methods":["GET","HEAD"]},"guide.merchants.detail":{"uri":"guide\/merchants\/detail\/{id}","methods":["GET","HEAD"],"parameters":["id"]},"guide.merchants.category":{"uri":"guide\/merchants\/category\/{category}","methods":["GET","HEAD"],"parameters":["category"]},"guide.products.category":{"uri":"guide\/products\/category\/{category}","methods":["GET","HEAD"],"parameters":["category"]},"guide.qrcode.index":{"uri":"guide\/qrcode","methods":["GET","HEAD"]},"guide.qrcode.histories":{"uri":"guide\/qrcode\/histories","methods":["GET","HEAD"]},"guide.inbox.merchant":{"uri":"guide\/inbox\/merchant","methods":["GET","HEAD"]},"guide.inbox.admin":{"uri":"guide\/inbox\/admin","methods":["GET","HEAD"]},"guide.profile.index":{"uri":"guide\/profile","methods":["GET","HEAD"]},"guide.profile.detail":{"uri":"guide\/profile\/detail","methods":["GET","HEAD"]},"guide.profile.edit":{"uri":"guide\/profile\/edit","methods":["GET","HEAD"]},"merchant.login":{"uri":"merchant\/login","methods":["GET","HEAD"]},"merchant.register":{"uri":"merchant\/register","methods":["GET","HEAD"]},"merchant.home":{"uri":"merchant","methods":["GET","HEAD"]},"merchant.inbox.index":{"uri":"merchant\/inbox","methods":["GET","HEAD"]},"merchant.member.index":{"uri":"merchant\/member","methods":["GET","HEAD"]},"merchant.profile.index":{"uri":"merchant\/profile","methods":["GET","HEAD"]},"merchant.qrcode.index":{"uri":"merchant\/qrcode","methods":["GET","HEAD"]},"merchant.qrcode.histories":{"uri":"merchant\/qrcode\/histories","methods":["GET","HEAD"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
