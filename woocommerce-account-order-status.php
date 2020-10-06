<?php

function valid_order_status($status) {
  if($status === 'failed' ) {
    return false;
  }

  if($status === 'cancelled' ) {
    return false;
  }

  if($status === 'refunded' ) {
    return false;
  }

  if($status === 'consolideted' ) {
    return false;
  }

  return true;
} 

add_action( 'woocommerce_order_details_before_order_table', 'view_order_custom_payment_instruction', 5, 1); // Email notifications
function view_order_custom_payment_instruction( $order ){ ?>
    <div class="order-status-block">
      <strong>Informações de rastreamento</strong>
      <p style="text-transform: uppercase; font-weight: 600;font-size: 14px !important;line-height: 20px;color: #007A75;">Status: <?php echo wc_get_order_status_name( $order->get_status() )  ?></p>
      <?php if(valid_order_status($order->get_status())) : ?>

        <ul class="-<?= $order->get_status() ?>">
          <li>Pedido realizado</li>
          <li>Aguardando fechar Lote </li>
          <li>Lote Fechado</li>
          <li>Aguardando Fornecedor </li>
          <li>Lote Enviado para Entrega</li>
          <li>Lote Entregue. Retire seu Pedido</li>
          <li>Concluído</li>
        </ul>

     <?php else : ?>

        <ul class="-<?= $order->get_status() ?>">
          <li><?php echo wc_get_order_status_name( $order->get_status() )  ?></li>
          <!-- <li>Pedido realizado</li>
          <li>Aguardando fechar Lote </li>
          <li>Lote Fechado</li>
          <li>Aguardando Fornecedor </li>
          <li>Lote Enviado para Entrega</li>
          <li>Lote Entregue. Retire seu Pedido</li>
          <li>Concluído</li> -->
        </ul>

        <style>
          .order-status-block li {
            color: red !important;
          }
          .order-status-block li:before {
            background-color: red !important;
          }
        </style>
        
      <?php endif; ?>
        
    </div>

      <style>
        /* Order Status */
 .order-status-block {
	 width: 110%;
	 background: #f6f6f6;
	 margin: 32px 0 32px -16px;
	 padding: 24px 16px 36px;
}
 .order-status-block ul {
	 padding-left: 25px;
}
 .order-status-block strong {
	 display: block;
	 font-size: 18px;
	 line-height: 24px;
	 margin-bottom: 24px;
}
 .order-status-block li {
	 position: relative;
	 border-left: 4px solid #afafaf;
	 padding-left: 20px;
	 padding-bottom: 40px;
   color: #757575;
   list-style: none;
}
 .order-status-block li:before {
	 content: '';
	 position: absolute;
	 top: -1px;
	 left: -14px;
	 display: block;
	 width: 24px;
	 height: 24px;
	 border-radius: 50%;
	 background: #afafaf;
}
 .order-status-block li:after {
	 content: '';
	 position: absolute;
	 top: 5px;
	 left: -8px;
	 display: block;
	 width: 12px;
	 height: 12px;
	 background-image: url('http://loja.grupy.com.br/wp-content/uploads/2020/09/Vector-4.png');
	 background-size: contain;
	 background-repeat: no-repeat;
}
 .order-status-block li:last-of-type {
	 border-color: transparent;
	 padding-bottom: 0;
}
 @media (min-width: 768px) {
	 .order-status-block {
		 width: 100%;
		 margin: 16px 0;
	}
}
 .order-status-block ul.-processing li:first-of-type, 
 .order-status-block ul.-pending li:first-of-type, 
 .order-status-block ul.-on-hold li:first-of-type {
	 color: #2dcc89;
	 border-color: #2dcc89;
}
 .order-status-block ul.-processing li:first-of-type:before, 
 .order-status-block ul.-pending li:first-of-type:before, 
 .order-status-block ul.-on-hold li:first-of-type:before {
	 background-color: #2dcc89;
}
 .order-status-block ul.-processing li:first-of-type:after, 
 .order-status-block ul.-pending li:first-of-type:after, 
 .order-status-block ul.-on-hold li:first-of-type:after {
	 background-image: url('http://loja.grupy.com.br/wp-content/uploads/2020/09/checkmark-1.png');
}
 .order-status-block ul.-processing li:nth-child(2), 
 .order-status-block ul.-pending li:nth-child(2), 
 .order-status-block ul.-on-hold li:nth-child(2) {
	 color: #eb7302;
	 border-color: #eb7302;
}
 .order-status-block ul.-processing li:nth-child(2):before, 
 .order-status-block ul.-pending li:nth-child(2):before, 
 .order-status-block ul.-on-hold li:nth-child(2):before {
	 background-color: #eb7302;
}




 .order-status-block ul.-lot_closed li:nth-child(2),
 .order-status-block ul.-lot_closed li:first-of-type {
	 color: #2dcc89;
	 border-color: #2dcc89;
}
 .order-status-block ul.-lot_closed li:nth-child(2):before, 
 .order-status-block ul.-lot_closed li:first-of-type:before {
	 background-color: #2dcc89;
}
 .order-status-block ul.-lot_closed li:nth-child(2):after, 
 .order-status-block ul.-lot_closed li:first-of-type:after {
	 background-image: url('http://loja.grupy.com.br/wp-content/uploads/2020/09/checkmark-1.png');
}
 .order-status-block ul.-lot_closed li:nth-child(3) {
	 color: #eb7302;
	 border-color: #eb7302;
}
 .order-status-block ul.-lot_closed li:nth-child(3):before {
	 background-color: #eb7302;
}





 .order-status-block ul.-supplier li:nth-child(3),
 .order-status-block ul.-supplier li:nth-child(2), 
 .order-status-block ul.-supplier li:first-of-type {
	 color: #2dcc89;
	 border-color: #2dcc89;
}

 .order-status-block ul.-supplier li:nth-child(3):before, 
 .order-status-block ul.-supplier li:nth-child(2):before, 
 .order-status-block ul.-supplier li:first-of-type:before {
	 background-color: #2dcc89;
}
 .order-status-block ul.-supplier li:nth-child(3):after, 
 .order-status-block ul.-supplier li:nth-child(2):after, 
 .order-status-block ul.-supplier li:first-of-type:after {
	 background-image: url('http://loja.grupy.com.br/wp-content/uploads/2020/09/checkmark-1.png');
}

 .order-status-block ul.-supplier li:nth-child(4) {
	 color: #eb7302;
	 border-color: #eb7302;
}
 .order-status-block ul.-supplier li:nth-child(4):before {
	 background-color: #eb7302;
}





 .order-status-block ul.-shipping li:nth-child(4), 
 .order-status-block ul.-shipping li:nth-child(3), 
 .order-status-block ul.-shipping li:nth-child(2), 
 .order-status-block ul.-shipping li:first-of-type {
	 color: #2dcc89;
	 border-color: #2dcc89;
 }

 .order-status-block ul.-shipping li:nth-child(4):before, 
 .order-status-block ul.-shipping li:nth-child(3):before, 
 .order-status-block ul.-shipping li:nth-child(2):before, 
 .order-status-block ul.-shipping li:first-of-type:before {
	 background-color: #2dcc89;
}

 .order-status-block ul.-shipping li:nth-child(4):after, 
 .order-status-block ul.-shipping li:nth-child(3):after, 
 .order-status-block ul.-shipping li:nth-child(2):after, 
 .order-status-block ul.-shipping li:first-of-type:after {
	 background-image: url('http://loja.grupy.com.br/wp-content/uploads/2020/09/checkmark-1.png');
}
 .order-status-block ul.-shipping li:nth-child(5) {
	 color: #eb7302;
	 border-color: #eb7302;
}
 .order-status-block ul.-shipping li:nth-child(5):before {
	 background-color: #eb7302;
}





 /* .order-status-block ul.-shipping li:nth-child(5), 
 .order-status-block ul.-shipping li:nth-child(4), 
 .order-status-block ul.-shipping li:nth-child(3), 
 .order-status-block ul.-shipping li:nth-child(2), 
 .order-status-block ul.-shipping li:first-of-type {
	 color: #2dcc89;
	 border-color: #2dcc89;
}
 .order-status-block ul.-shipping li:nth-child(5):before, 
 .order-status-block ul.-shipping li:nth-child(4):before, 
 .order-status-block ul.-shipping li:nth-child(3):before, 
 .order-status-block ul.-shipping li:nth-child(2):before, 
 .order-status-block ul.-shipping li:first-of-type:before {
	 background-color: #2dcc89;
}
 .order-status-block ul.-shipping li:nth-child(5):after, 
 .order-status-block ul.-shipping li:nth-child(4):after, 
 .order-status-block ul.-shipping li:nth-child(3):after, 
 .order-status-block ul.-shipping li:nth-child(2):after, 
 .order-status-block ul.-shipping li:first-of-type:after {
	 background-image: url('http://loja.grupy.com.br/wp-content/uploads/2020/09/checkmark-1.png');
}

 .order-status-block ul.-shipping li:nth-child(6) {
	 color: #eb7302;
	 border-color: #eb7302;
}
 .order-status-block ul.-shipping li:nth-child(6):before {
	 background-color: #eb7302;
} */





 .order-status-block ul.-remove li:nth-child(5), 
 .order-status-block ul.-remove li:nth-child(4), 
 .order-status-block ul.-remove li:nth-child(3), 
 .order-status-block ul.-remove li:nth-child(2), 
 .order-status-block ul.-remove li:first-of-type,
 .order-status-block ul.-delivered li:nth-child(6), 
 .order-status-block ul.-delivered li:nth-child(5), 
 .order-status-block ul.-delivered li:nth-child(4), 
 .order-status-block ul.-delivered li:nth-child(3), 
 .order-status-block ul.-delivered li:nth-child(2), 
 .order-status-block ul.-delivered li:first-of-type {
	 color: #2dcc89;
	 border-color: #2dcc89;
}
 .order-status-block ul.-remove li:nth-child(5):before, 
 .order-status-block ul.-remove li:nth-child(4):before, 
 .order-status-block ul.-remove li:nth-child(3):before, 
 .order-status-block ul.-remove li:nth-child(2):before, 
 .order-status-block ul.-remove li:first-of-type:before,
 .order-status-block ul.-delivered li:nth-child(5):before, 
 .order-status-block ul.-delivered li:nth-child(4):before, 
 .order-status-block ul.-delivered li:nth-child(3):before, 
 .order-status-block ul.-delivered li:nth-child(2):before, 
 .order-status-block ul.-delivered li:first-of-type:before {
	 background-color: #2dcc89;
}
 .order-status-block ul.-remove li:nth-child(5):after, 
 .order-status-block ul.-remove li:nth-child(4):after, 
 .order-status-block ul.-remove li:nth-child(3):after, 
 .order-status-block ul.-remove li:nth-child(2):after, 
 .order-status-block ul.-remove li:first-of-type:after,
 .order-status-block ul.-delivered li:nth-child(5):after, 
 .order-status-block ul.-delivered li:nth-child(4):after, 
 .order-status-block ul.-delivered li:nth-child(3):after, 
 .order-status-block ul.-delivered li:nth-child(2):after, 
 .order-status-block ul.-delivered li:first-of-type:after {
	 background-image: url('http://loja.grupy.com.br/wp-content/uploads/2020/09/checkmark-1.png');
}

 .order-status-block ul.-remove li:nth-child(6),
 .order-status-block ul.-delivered li:nth-child(6) {
	 color: #eb7302;
	 border-color: #eb7302;
}
 .order-status-block ul.-remove li:nth-child(6):before,
 .order-status-block ul.-delivered li:nth-child(6):before {
	 background-color: #eb7302;
}





 .order-status-block ul.-completed li:nth-child(7), 
 .order-status-block ul.-completed li:nth-child(6), 
 .order-status-block ul.-completed li:nth-child(5), 
 .order-status-block ul.-completed li:nth-child(4), 
 .order-status-block ul.-completed li:nth-child(3), 
 .order-status-block ul.-completed li:nth-child(2), 
 .order-status-block ul.-completed li:first-of-type {
	 color: #2dcc89;
	 border-color: #2dcc89;
}
 .order-status-block ul.-completed li:nth-child(7):before, 
 .order-status-block ul.-completed li:nth-child(6):before, 
 .order-status-block ul.-completed li:nth-child(5):before, 
 .order-status-block ul.-completed li:nth-child(4):before, 
 .order-status-block ul.-completed li:nth-child(3):before, 
 .order-status-block ul.-completed li:nth-child(2):before, 
 .order-status-block ul.-completed li:first-of-type:before {
	 background-color: #2dcc89;
}
 .order-status-block ul.-completed li:nth-child(7):after, 
 .order-status-block ul.-completed li:nth-child(6):after, 
 .order-status-block ul.-completed li:nth-child(5):after, 
 .order-status-block ul.-completed li:nth-child(4):after, 
 .order-status-block ul.-completed li:nth-child(3):after, 
 .order-status-block ul.-completed li:nth-child(2):after, 
 .order-status-block ul.-completed li:first-of-type:after {
	 background-image: url('http://loja.grupy.com.br/wp-content/uploads/2020/09/checkmark-1.png');
}
 /* .order-status-block ul.-completed li:nth-child(5) {
	 color: #eb7302;
	 border-color: #eb7302;
}
 .order-status-block ul.-completed li:nth-child(5):before {
	 background-color: #eb7302;
} */
 @media (max-width: 1023px) {
	 .header-account-order-details {
		 padding-left: 16px;
	}
}
/* // .order-status-block ul.-completed {
	 // li {
		 // color: #2DCC89 !important;
		 // border-color: #2DCC89 !important;
		 // 
	}
	 // li:before {
		 // background-color: #2DCC89 !important;
		 // 
	}
	 // li:after {
		 // background-image: url('http://loja.grupy.com.br/wp-content/uploads/2020/09/checkmark-1.png') !important;
		 // 
	}
	 // 
}
 */
 
      </style>
<?php }