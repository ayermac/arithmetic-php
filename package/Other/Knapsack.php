<?php
/**
 * 背包问题
 * -------------------------------------------------------------
 * 思路分析：贪心算法
 * -------------------------------------------------------------：
 * 有一个背包，背包容量是M=150。有7个物品，物品可以分割成任意大小。要求尽可能让装入背包中的物品总价值最大，但不能超过总容量。
 * 物品 A B C D E F G
 * 重量 35 30 60 50 40 10 25
 * 价值 10 40 30 50 35 40 30
 * @author chenchao <codemac@163.com>
 * @date 2020/6/26
 */

class Knapsack
{
    /**
     * 物品重量
     * @var
     */
    protected $weight;

    /**
     * 物品价值
     * @var
     */
    protected $value;

    /**
     * 包的总重量
     * @var
     */
    protected $packageWeight;

    /**
     * Knapsack constructor.
     * @param array $weight
     * @param array $value
     * @param int $packageWeight
     */
    public function __construct(array $weight, array $value, int $packageWeight)
    {
        $this->weight = $weight;
        $this->value = $value;
        $this->packageWeight = $packageWeight;
    }

    public function bag()
    {
        $product = [];
        foreach ($this->weight as $k => $v) {
            $product[] = [
                'weight' => $v,
                'value' => $this->value[$k],
                'valueRatio' => ($this->value[$k] / $v),// 价值比
            ];
        }

        // 总价值
        $totalValue = 0;
        // 总重量
        $totalWeight = 0;
        // 按照价值比排序
        $sortedProduct = $this->sortByValueRatio($product);
        print_r($sortedProduct);
        foreach ($sortedProduct as $k => $v) {
            if ($totalWeight + $v['weight'] <= $this->packageWeight) {
                $totalValue += $v['value'];
                $totalWeight += $v['weight'];
            } elseif ($totalWeight < $this->packageWeight) {
                // 背包未塞满，往下寻找最小体积的物品放入背包
                for ($j = $k + 1; $j < count($sortedProduct); $j++) {
                    if ($totalWeight + $sortedProduct[$j]['weight'] <= $this->packageWeight) {
                        $totalValue += $sortedProduct[$j]['value'];
                        $totalWeight += $sortedProduct[$j]['weight'];
                    }
                }

                break;
            } else {
                break;
            }
        }

        return [$totalWeight, $totalValue];
    }

    /**
     * 根据valueRatio倒叙排
     * @param $product
     * @return mixed
     * @author codemac@163.com
     */
    private function sortByValueRatio($product)
    {
        $count = count($product);

        for ($i = 0; $i < $count; $i++) {
            for ($j = $i + 1; $j < $count; $j++) {
                if ($product[$i]['valueRatio'] < $product[$j]['valueRatio']) {
                    $temp = $product[$i];
                    $product[$i] = $product[$j];
                    $product[$j] = $temp;
                }
            }
        }

        return $product;
    }
}

$obj = new Knapsack([5, 30, 60, 50, 40, 15, 10],[1, 40, 30, 50, 35, 40, 30],150);
print_r($obj->bag());
