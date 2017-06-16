<?php
class Tree_example
{
    /**
     * 树型数据表结果集处理
     * @param string $result_sel 结果
     */
    public function handler($result_sel) {
        $already = [];
        $tmps = [];
        foreach ($result_sel as $node) {
            $tmp[$node['pid']][] = $node;
        }
        krsort($tmp);
        for ($i = count($tmp); $i > 0; $i--) {
            foreach ($tmp as $k => $v) {
                if (!in_array($k, $already)) {
                    if (!$tmps) {
                        $tmps = array($k, $v);
                        $already[] = $k;
                        continue;
                    } else {
                        foreach ($v as $key => $value) {
                            if ($value['Id'] == $tmps[0]) {
                                $tmp[$k][$key]['child'] = $tmps[1];
                                $tmps = array($k, $tmp[$k]);
                            }
                        }
                    }
                }
            }
            $tmpp = [];
        }
        return $tmp[0];
    }
}