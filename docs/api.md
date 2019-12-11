### API 请求方式

* GET
    * Retrieve the resource from the server (e.g. when visiting a page);
* POST  （使用 Body 方式）
    * Create a resource on the server (e.g. when submitting a form);
* PUT/PATCH  (统一使用PUT)
    * Update the resource on the server (used by APIs);
* DELETE
    * Delete the resource from the server (used by APIs).
    
##### 注： 
    1、 URI 中不可出现 动词
    2、 版本号 放至 header 里传递 


### API 文档

* Api 文档 使用 Swagger 展示 ，Json 格式编写  （本地 访问 http://192.168.40.236:8005/swagger/swagger.html）

* 原则：废弃的，或者修改的 api 不进行删除，类似 Demo 中标注出来，便于后期进行维护或者需求接口溯源。