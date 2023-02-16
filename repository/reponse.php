<?php
class Reponse
{
    private ArrayObject $_data;
    private Exception $_exception;
    
    public function getData(): ArrayObject
    {
        return $this->_data;
    }
    public function isDataFound():bool
        {
            return (count($this->_data)!=0);
        }
    public function isSuccessfull(): bool
        {
            return !isset($this->_exception);
        }
    public function getException(): Exception
        {
            return $this->_exception;
        }
    public function __construct(ArrayObject $pData, Exception $pException=NULL)
        {
            $this->_data=$pData;
            if ($pException!=null)
                $this->_exception=$pException;
        }
        public function __toString()
    {
        return json_encode($this);
    }
}
?>