const Ziggy = {
    url: "http://127.0.0.1:8000",
    port: null,
    defaults: {},
    routes: {
        home: { uri: "/", methods: ["GET", "HEAD"] },
        "admin.product.create": {
            uri: "admin/product/create",
            methods: ["GET", "HEAD"],
        },
        "admin.product.manage": {
            uri: "admin/product/manage",
            methods: ["GET", "HEAD"],
        },
        "admin.product.store": {
            uri: "admin/product/create",
            methods: ["POST"],
        },
        "user.coin.manage": {
            uri: "user/k-coin/manage",
            methods: ["GET", "HEAD"],
        },
        "user.coin.use": { uri: "user/k-coin/use", methods: ["GET", "HEAD"] },
        "admin.coin.manage": {
            uri: "admin/k-coin/manage",
            methods: ["GET", "HEAD"],
        },
        "admin.announcement.create": {
            uri: "admin/announcement/create",
            methods: ["GET", "HEAD"],
        },
        "admin.announcement.delete": {
            uri: "admin/announcement/delete/{id}",
            methods: ["DELETE"],
            parameters: ["id"],
        },
        "admin.announcement.store": {
            uri: "admin/announcement/create",
            methods: ["POST"],
        },
        inquiry: { uri: "inquiry", methods: ["GET", "HEAD"] },
        announcement: { uri: "announcement", methods: ["GET", "HEAD"] },
        "storage.local": {
            uri: "storage/{path}",
            methods: ["GET", "HEAD"],
            wheres: { path: ".*" },
            parameters: ["path"],
        },
    },
};
if (typeof window !== "undefined" && typeof window.Ziggy !== "undefined") {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
