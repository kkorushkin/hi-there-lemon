<?php
class ModelExtensionTotalDiscount extends Model {
    public function getTotal($total) {
        $this->load->language('extension/total/discount');

        if($total['total'] >= $this->config->get('total_discount_amount')) {

            $discount = ($total['total'] / 100) * ($this->config->get('total_discount') * -1);

            $total['totals'][] = array(
                'code'       => 'discount',
                'title'      => sprintf($this->language->get('text_discount'), $this->config->get('total_discount')),
                'value'      => $discount,
                'sort_order' => $this->config->get('total_discount_sort_order')
            );

            $total['total'] += $discount;

        }

        $this->log->write($total);

    }
}