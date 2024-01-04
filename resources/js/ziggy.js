const Ziggy = {"url":"http:\/\/localhost:8000","port":8000,"defaults":{},"routes":{"debugbar.openhandler":{"uri":"_debugbar\/open","methods":["GET","HEAD"]},"debugbar.clockwork":{"uri":"_debugbar\/clockwork\/{id}","methods":["GET","HEAD"],"parameters":["id"]},"debugbar.assets.css":{"uri":"_debugbar\/assets\/stylesheets","methods":["GET","HEAD"]},"debugbar.assets.js":{"uri":"_debugbar\/assets\/javascript","methods":["GET","HEAD"]},"debugbar.cache.delete":{"uri":"_debugbar\/cache\/{key}\/{tags?}","methods":["DELETE"],"parameters":["key","tags"]},"api.token-get":{"uri":"api\/token\/get","methods":["GET","HEAD"]},"api.token-renew":{"uri":"api\/token\/renew","methods":["GET","HEAD"]},"apdoc.api-documentation":{"uri":"api-documentation","methods":["GET","HEAD"]},"apdoc.json":{"uri":"api-documentation\/json","methods":["GET","HEAD"]},"welcome":{"uri":"\/","methods":["GET","HEAD"]},"utils.subscription":{"uri":"utils\/subscription\/{type}","methods":["GET","HEAD"],"parameters":["type"]},"guide.login":{"uri":"guide\/login","methods":["GET","HEAD"]},"guide.login.store":{"uri":"guide\/login","methods":["POST"]},"guide.register":{"uri":"guide\/register","methods":["GET","HEAD"]},"guide.register.store":{"uri":"guide\/register","methods":["POST"]},"guide.login.forgot-password":{"uri":"guide\/forgot-password","methods":["POST"]},"guide.home":{"uri":"guide","methods":["GET","HEAD"]},"guide.home.search":{"uri":"guide\/search\/{search}","methods":["GET","HEAD"],"parameters":["search"]},"guide.logout":{"uri":"guide\/logout","methods":["POST"]},"guide.home.merchant-categories":{"uri":"guide\/home\/merchant-categories\/{category}","methods":["GET","HEAD"],"parameters":["category"]},"guide.order.guide":{"uri":"guide\/order\/place-order\/guide","methods":["POST"]},"guide.merchants.index":{"uri":"guide\/merchants","methods":["GET","HEAD"]},"guide.merchants.index-data":{"uri":"guide\/merchants\/index-data","methods":["GET","HEAD"]},"guide.merchants.detail":{"uri":"guide\/merchants\/detail\/{id}","methods":["GET","HEAD"],"parameters":["id"]},"guide.merchants.booking":{"uri":"guide\/merchants\/detail\/{id}\/booking","methods":["POST"],"parameters":["id"]},"guide.merchants.category":{"uri":"guide\/merchants\/category\/{category}","methods":["GET","HEAD"],"parameters":["category"]},"guide.merchants.featured":{"uri":"guide\/merchants\/featured\/{featured}","methods":["GET","HEAD"],"parameters":["featured"]},"guide.merchants.category-data":{"uri":"guide\/merchants\/category-data\/{type}\/{category}","methods":["GET","HEAD"],"parameters":["type","category"]},"guide.products.category":{"uri":"guide\/products\/category\/{category}","methods":["GET","HEAD"],"parameters":["category"]},"guide.products.category-data":{"uri":"guide\/products\/category-data\/{category}","methods":["GET","HEAD"],"parameters":["category"]},"guide.qrcode.index":{"uri":"guide\/qrcode","methods":["GET","HEAD"]},"guide.qrcode.histories.scan":{"uri":"guide\/qrcode\/histories\/scan","methods":["GET","HEAD"]},"guide.qrcode.histories.scan-data":{"uri":"guide\/qrcode\/histories\/scan-data","methods":["GET","HEAD"]},"guide.qrcode.histories.booking":{"uri":"guide\/qrcode\/histories\/booking","methods":["GET","HEAD"]},"guide.qrcode.histories.booking-data":{"uri":"guide\/qrcode\/histories\/booking-data","methods":["GET","HEAD"]},"guide.inbox.merchant":{"uri":"guide\/inbox\/merchant","methods":["GET","HEAD"]},"guide.inbox.admin":{"uri":"guide\/inbox\/admin","methods":["GET","HEAD"]},"guide.inbox.merchant-data":{"uri":"guide\/inbox\/merchant-data","methods":["GET","HEAD"]},"guide.inbox.admin-data":{"uri":"guide\/inbox\/admin-data","methods":["GET","HEAD"]},"guide.profile.index":{"uri":"guide\/profile","methods":["GET","HEAD"]},"guide.profile.detail":{"uri":"guide\/profile\/detail","methods":["GET","HEAD"]},"guide.profile.edit":{"uri":"guide\/profile\/edit","methods":["POST"]},"guide.profile.change-password":{"uri":"guide\/profile\/change-password","methods":["POST"]},"guide.feedback.complaint":{"uri":"guide\/feedback\/complaint","methods":["POST"]},"merchant.login":{"uri":"merchant\/login","methods":["GET","HEAD"]},"merchant.login.store":{"uri":"merchant\/login","methods":["POST"]},"merchant.register":{"uri":"merchant\/register","methods":["GET","HEAD"]},"merchant.register.store":{"uri":"merchant\/register","methods":["POST"]},"merchant.login.forgot-password":{"uri":"merchant\/forgot-password","methods":["POST"]},"merchant.home":{"uri":"merchant","methods":["GET","HEAD"]},"merchant.home.edit":{"uri":"merchant\/edit","methods":["GET","HEAD"]},"merchant.home.edit.store":{"uri":"merchant\/edit","methods":["POST"]},"merchant.inbox.index":{"uri":"merchant\/inbox","methods":["GET","HEAD"]},"merchant.inbox.index-data":{"uri":"merchant\/inbox-data","methods":["GET","HEAD"]},"merchant.inbox.detail":{"uri":"merchant\/inbox\/{id}","methods":["GET","HEAD"],"parameters":["id"]},"merchant.member.index":{"uri":"merchant\/member","methods":["GET","HEAD"]},"merchant.member.index-data":{"uri":"merchant\/member-data","methods":["GET","HEAD"]},"merchant.logout":{"uri":"merchant\/logout","methods":["POST"]},"merchant.products.add":{"uri":"merchant\/products\/add","methods":["GET","HEAD"]},"merchant.products.store":{"uri":"merchant\/products\/add","methods":["POST"]},"merchant.products.detail":{"uri":"merchant\/products\/detail\/{id}","methods":["GET","HEAD"],"parameters":["id"]},"merchant.products.edit":{"uri":"merchant\/products\/edit\/{id}","methods":["GET","HEAD"],"parameters":["id"]},"merchant.products.edit.update":{"uri":"merchant\/products\/edit\/{id}","methods":["POST"],"parameters":["id"]},"merchant.products.delete":{"uri":"merchant\/products\/delete\/{id}","methods":["DELETE"],"parameters":["id"]},"merchant.order.merchant":{"uri":"merchant\/order\/place-order\/merchant","methods":["POST"]},"merchant.order.product":{"uri":"merchant\/order\/place-order\/product\/{id}","methods":["POST"],"parameters":["id"]},"merchant.order.merchant.histories":{"uri":"merchant\/order\/histories\/merchant","methods":["GET","HEAD"]},"merchant.order.merchant.histories-data":{"uri":"merchant\/order\/histories\/merchant-data","methods":["GET","HEAD"]},"merchant.profile.index":{"uri":"merchant\/profile","methods":["GET","HEAD"]},"merchant.profile.change-password":{"uri":"merchant\/profile\/change-password","methods":["POST"]},"merchant.qrcode.index":{"uri":"merchant\/qrcode","methods":["GET","HEAD"]},"merchant.qrcode.histories":{"uri":"merchant\/qrcode\/histories","methods":["GET","HEAD"]},"merchant.qrcode.histories-data":{"uri":"merchant\/qrcode\/histories-data","methods":["GET","HEAD"]},"merchant.qrcode.check-qr":{"uri":"merchant\/qrcode\/check-qr\/{token}","methods":["GET","HEAD"],"parameters":["token"]},"merchant.qrcode.reservation":{"uri":"merchant\/qrcode\/reservation\/{id}","methods":["POST"],"parameters":["id"]},"merchant.feedback.complaint":{"uri":"merchant\/feedback\/complaint","methods":["POST"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
