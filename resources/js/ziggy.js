const Ziggy = {
    url: "http://127.0.0.1:8000",
    port: null,
    defaults: {},
    routes: {
        home: { uri: "/", methods: ["GET", "HEAD"] },
        login: { uri: "login", methods: ["GET", "HEAD"] },
        "admin.product.create": {
            uri: "admin/product/create",
            methods: ["GET", "HEAD"],
        },
        "admin.product.index": {
            uri: "admin/product",
            methods: ["GET", "HEAD"],
        },
        "admin.product.edit": {
            uri: "admin/product/{id}/edit",
            methods: ["GET", "HEAD"],
            parameters: ["id"],
        },
        "admin.product.store": { uri: "admin/product", methods: ["POST"] },
        "admin.product.update": {
            uri: "admin/product/{id}",
            methods: ["PUT"],
            parameters: ["id"],
        },
        "admin.product.destroy": {
            uri: "admin/product/{id}",
            methods: ["DELETE"],
            parameters: ["id"],
        },
        "user.coin.manage.index": {
            uri: "user/k-coin/manage",
            methods: ["GET", "HEAD"],
        },
        "user.coin.use.index": {
            uri: "user/k-coin/use",
            methods: ["GET", "HEAD"],
        },
        "user.coin.use.store": { uri: "user/k-coin/use", methods: ["POST"] },
        "user.coin.use.update": {
            uri: "user/k-coin/use/{id}",
            methods: ["PUT"],
            parameters: ["id"],
        },
        "admin.coin.index": { uri: "admin/k-coin", methods: ["GET", "HEAD"] },
        "admin.announcement.create": {
            uri: "admin/announcement/create",
            methods: ["GET", "HEAD"],
        },
        "admin.announcement.edit": {
            uri: "admin/announcement/{id}/edit",
            methods: ["GET", "HEAD"],
            parameters: ["id"],
        },
        "admin.announcement.store": {
            uri: "admin/announcement",
            methods: ["POST"],
        },
        "admin.announcement.update": {
            uri: "admin/announcement/{id}",
            methods: ["PUT"],
            parameters: ["id"],
        },
        "admin.announcement.destroy": {
            uri: "admin/announcement/{id}",
            methods: ["DELETE"],
            parameters: ["id"],
        },
        "inquiry.index": { uri: "inquiry", methods: ["GET", "HEAD"] },
        "inquiry.create": { uri: "inquiry/create", methods: ["GET", "HEAD"] },
        "inquiry.edit": {
            uri: "inquiry/{id}/edit",
            methods: ["GET", "HEAD"],
            parameters: ["id"],
        },
        "inquiry.show": {
            uri: "inquiry/{id}",
            methods: ["GET", "HEAD"],
            parameters: ["id"],
        },
        "inquiry.store": { uri: "inquiry", methods: ["POST"] },
        "inquiry.update": {
            uri: "inquiry/{id}",
            methods: ["PUT"],
            parameters: ["id"],
        },
        "inquiry.destroy": {
            uri: "inquiry/{id}",
            methods: ["DELETE"],
            parameters: ["id"],
        },
        "admin.inquiry.answer.store": {
            uri: "admin/inquiry/{inquiry_id}/answer",
            methods: ["POST"],
            parameters: ["inquiry_id"],
        },
        "admin.inquiry.answer.destroy": {
            uri: "admin/inquiry/{inquiry_id}/answer/{id}",
            methods: ["DELETE"],
            parameters: ["inquiry_id", "id"],
        },
        "admin.inquiry.answer.update": {
            uri: "admin/inquiry/{inquiry_id}/answer/{id}",
            methods: ["PUT"],
            parameters: ["inquiry_id", "id"],
        },
        "announcement.index": { uri: "announcement", methods: ["GET", "HEAD"] },
        "announcement.show": {
            uri: "announcement/{id}",
            methods: ["GET", "HEAD"],
            parameters: ["id"],
        },
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
