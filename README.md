# rumvalidate
参数校验器



### 1.1更新内容
1. 添加规则dotInt，支持逗号分隔的整形数字校验。
2. 添加规则maxDot，支持逗号分隔参数个数的校验，可配合dotInt使用。

        $rules = [
            'ids' => [[R::required(), R::dotInt(),R::maxDot(10)]] // 参数ids支持逗号分页的多id传参，且最多不可超过10个
        ];

3. 添加规则isArr,支持数组类型参数的校验。

        规则原型：function isArr($msg = '', $max = 0, $vfn = null):
        $msg: 校验失败时错误提示信息。
        $max: 参数长度最大值。
        $vfn: 对数组中每个元素应用该规则进行校验，返回值为true或者false，当第一个false返回时则校验失败。

4. 添加规则resetKey,支持重置字段名称。

        $rules5 = [
            'age' => [[R::resetKey('tage')]], // 请求参数中包含字段age，校验结果中将包含tage字段并且值为原age字段的值
        ];

5. 添加规则paginate，支持自动生成数据库查询时需要的分页参数。

        $rules7 = [
            'curpage' => [[R::optional(1)]],        // 默认第一页，每页20条记录
            'perpage' => [[R::optional(20)]],
            'paginate' => [[R::paginate()]]         // 校验结果中将自动包含字段：['pagination'=>["offset"=>0,"perpage"=>20]]
        ];

6. 规则optional支持默认值设置。

        $rules5 = [
            'age' => [[R::optional('13')]], // 如果请求参数中未包含字段age，则校验结果中将包含age字段并且值为13
        ];

**注：** 如果之前optional设置了错误说明，在升级时需要删除。

7. 支持errorcode继承：设置过一次errorcode后，后续不需要再次设置errorcode，所有规则将使用该值直到再次设置它。

        $rules5 = [
            'workcode' => [[R::optional('125057'), R::emptystr(), R::num()], '工号', 1003], // 设置errorcode为1003 
            'age' => [[R::required(), R::num()], 'age']     // 该规则将继承使用errorcode 1003
        ];

    

