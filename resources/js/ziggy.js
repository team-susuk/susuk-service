const Ziggy = {"url":"http:\/\/localhost:8000","port":8000,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"welcome":{"uri":"\/","methods":["GET","HEAD"]},"guide.login":{"uri":"guide\/login","methods":["GET","HEAD"]},"guide.register":{"uri":"guide\/register","methods":["GET","HEAD"]},"guide.home":{"uri":"guide","methods":["GET","HEAD"]},"guide.merchants.index":{"uri":"guide\/merchants","methods":["GET","HEAD"]},"guide.merchants.detail":{"uri":"guide\/merchants\/detail\/{id}","methods":["GET","HEAD"],"parameters":["id"]},"guide.qrcode.index":{"uri":"guide\/qrcode","methods":["GET","HEAD"]},"guide.qrcode.histories":{"uri":"guide\/qrcode\/histories","methods":["GET","HEAD"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
